       


        <div class="contactform bd-example">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}"  data-whatever="@mdo">Connect</button>

                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">Send Message to {{$user->firstname}} {{$user->lastname}}</h4>

                            </div>

                                <div class="modal-body">
                                    {!! Form::open(['url' => 'contact']) !!}

                                    <div class="form-group">
                                        <label for="recipient-name">Name</label>
                                        {!!Form::text('name','',['class'=>'form-control']);!!}
                                    </div>

                                    <div class="form-group">
                                        <label for="message-text">Subject</label>
                                        {!!Form::text('subject','',['class'=>'form-control']);!!}
                                    </div>

                                    <div class="form-group">
                                        <label for="message-text">Message:</label>
                                        {!!Form::textarea('content','',['class'=>'form-control']);!!}
                                    </div>

                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                    {!! Form::close() !!}

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary send">Send message</button>
                                </div>
                        </div>
                    </div>
                </div>
        </div>