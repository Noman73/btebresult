@extends('layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Upload result
            </div>
            <div class="card-body">
              @php
                 $categories=App\Models\Category::all(); 
              @endphp
              <div class="form-group">
                <label for="">Result Category</label>
                <select class="form-control" id="category">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                    <label for="">Semister</label>
                    <select class="form-control" name="" id="semister">
                        <option value="1">Semister 1</option>
                        <option value="2">Semister 2</option>
                        <option value="3">Semister 3</option>
                        <option value="4">Semister 4</option>
                        <option value="5">Semister 5</option>
                        <option value="6">Semister 6</option>
                        <option value="7">Semister 7</option>
                        <option value="8">Semister 7</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">year</label>
                  <input class="form-control" type="number" id="year">
              </div>
                <div class="form-group">
                    <label for="">Text File</label>
                    <input class="form-control" type="file" id="myfile">
                </div>
            </div>
            <div class="card-footer">
                <button class='btn btn-primary' onclick="myfunc()">submit</button>

            </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saver"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var status;


function readFileAsString(file, callback) {
  var reader = new FileReader();
  
  reader.onload = function(event) {
    var text = event.target.result;
    callback(text);
  };
  reader.readAsText(file);
}



    var fileInput = document.getElementById('myfile');
    var arr;
    var freshArr=[];
    fileInput.addEventListener('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        readFileAsString(file, function(text){
        console.log(text.split('\n'));
        arr=text.split('\n');
            var regex = /^\d+\s+\(\d+(\.\d+)?\)/;
            var regex2=/^\d{6} \{ \d{4}\(T\)(, \d{4}\(T\))* \}$/;
            for(i=1;i<=arr.length;i++){
                if(arr[i]!='' && regex.test(arr[i].replace('\r',''))){
                    console.log(arr[i].replace('\r',''),'xxx');
                    console.log('find')
                    result=arr[i].replace('\r','');
                    result=result.split(' ')
                    freshArr.push([result[0],(result[1].replace('(','')).replace(')','') ]);
                }else if(arr[i]!='' && regex2.test(arr[i].replace('\r',''))){
                    result=arr[i].replace('\r','');
                    result=result.split('{');
                    freshArr.push([result[0],(result[1].replace(/\(T\)/g,'')).replace('}','').replace(/\s/g, '') ]);
                }else{
                    console.log('not find');
                }
                if(i==(arr.length-1)){
                    myfunc();
                }
            }
        });
    }        
    });

function myfunc(){
    console.log(freshArr)
    requestData(freshArr);
}

function requestData(getArr){
  return false;
  let category=$('#category').val();
  let semister=$('#semister').val();
  let year=$('#year').val();
  axios.post("{{URL::to('admin/result')}}",{result:getArr,category:category,semister:semister,year:year})
  .then(function (response) {
      console.log(response.data);
    })
    
}
function xxxx(){
      var txtfile=document.getElementById('myfile').files[0];
      console.log(txtfile)
      readTextFile1('new.txt'); //calling the function
      console.log(status);
      //time for looping >:D
      let splitStatus=status.split('\n')
      for(let i=0;i<splitStatus.length;i++){
      let line=splitStatus[i];
      console.log(line);
    //whateverYouWannaDoNext
    }
}
    </script>
@endpush
