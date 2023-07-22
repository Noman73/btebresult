
@extends('layouts.frontend.master')
@section('content')


<!-- ==============================================
    ** Inner Banner **
    =================================================== -->
    <div class="inner-banner contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <h1>Student Result</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-3"> <a href="apply-online.html" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                    </a></div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Contact Us **
    =================================================== -->
    <section class=" padding-lg">
        <div class="container">
            @php
                $category=App\Models\Category::all();
            @endphp
            <form>
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Exam Type</label>
                            <select class="form-control" name="" id="category">
                                <option value="">--SELECT--</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Semister</label>
                            <select class="form-control" name="semister" id="semister">
                                <option value="">--SELECT--</option>
                                <option value="1">Semister 1</option>
                                <option value="2">Semister 2</option>
                                <option value="3">Semister 3</option>
                                <option value="4">Semister 4</option>
                                <option value="5">Semister 5</option>
                                <option value="6">Semister 6</option>
                                <option value="7">Semister 7</option>
                                <option value="8">Semister 8</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Roll</label>
                            <input class="form-control" name="roll" id="roll" type="number" placeholder="Roll">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Year</label>
                            <input class="form-control" name="year" id="year" type="number" placeholder="Year">
                        </div>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary" onclick="submit()">Submit</button>
        </div>
    </section>
    <section>
        <div class="container visible-lg" id="result_sheet">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">
                            <tbody >

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function submit() {
            event.preventDefault();
            $.post("{{URL::to('api/result')}}",{
                category:$("#category").val(),
                semister:$("#semister").val(),
                roll:$("#roll").val(),
                year:$("#year").val(),
            })
            .then((res)=>{
                console.log(res)
                html="<tr><th>Exam Type</th>";
                html+="<td>"+res.data.category.name+"</td></tr>";
                html+="<tr><th>Semister</th>";
                html+="<td>Semister "+res.data.semister+"</td></tr>";
                html+="<tr><th>Roll</th>";

                html+="<td>"+res.data.roll+"</td></tr>";
                html+="<tr><th>Year</th>";
                html+="<td>"+res.data.year+"</td></tr>";
                html+="<tr><th>Result</th>";
                html+="<td>"+res.data.result+"</td></tr>";
                $('#result_sheet tbody').html(html)
                $('#result_sheet').removeClass('visible-lg')
            })
        }
    </script>
@endpush