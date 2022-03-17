<div class="row mx-5 px-5" id="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row">
                         <strong >First Name</strong>   
                        <div class="col-sm-5">
                             
                            {!! Form::text('f_name',$project-> f_name??'' , ['placeholder' => 'First Name' , 'class'=>'form-control']); !!}


                        </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Assigning Date:</strong>
                            <div class="col-sm-5">
                                {!!Form::date('as_date', $project->as_date??'' , ['class'=>'form-control'] );!!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Deadline:</strong>
                            <div class="col-sm-5">
                                {!!Form::date('deadline', $project->deadline??'' , ['class'=>'form-control'] );!!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <!-- <input type="email" name="email" class="form-control" value="{{$project->email??''}}" placeholder="abc@xyz.com"  required> -->
                            <div class="col-sm-5">
                                {!!Form::text('email', $project->email??'', ['placeholder' => 'abc@gmail.com' , 'class'=>'form-control']); !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->
                       
                        {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
                    </div>
                </div>