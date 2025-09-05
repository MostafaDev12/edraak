                                        <option value="">{{$langg->rtl == 1 ? 'عدد المستخدمين'  : 'users number'}}</option>
                                        @if(!empty($dates))
                                         @foreach($dates as $keys=>$c)
                                           <option value="{{ $values[$keys]}}" data-name="{{ $dates[$keys] }}">{{ $dates[$keys] }} </option>
                                        @endforeach
                                        @endif