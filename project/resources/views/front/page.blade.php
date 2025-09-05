                                        <option value="">Select Page</option>
                                         @foreach($zones as $c)
                                         @if(Auth::check())
                                         
                                          <option  value="{{$c->name}}">{{$c->name }} </option> 

                                          @else
                                          <option  value="{{$c->name}}">{{$c->name }} </option> 
                                          @endif
                                        @endforeach