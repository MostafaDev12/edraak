                                        <option value="">Select City</option>
                                         @foreach($zones as $c)
                                         @if(Auth::check())
                                         
                                          <option  value="{{$c->name}}">{{$langg->rtl == 1 ? $c->name_ar : $c->name }}</option> 
                                          <!--<option  value="{{$c->name}}" {{ Auth::user()->city == $c->name ? 'selected' : '' }}>{{$c->name }}  </option> -->
                                          @else
                                          <option  value="{{$c->name}}">{{$langg->rtl == 1 ? $c->name_ar : $c->name }}</option> 
                                          @endif
                                        @endforeach