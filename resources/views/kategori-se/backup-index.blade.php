<div class="tab-vertical">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    @if(isset($parameter))
                    @php
                    $number = 1;
                    @endphp
                    @foreach($parameter as $key => $value)
                    
                    <li class="nav-item">
                        <a class="nav-link {{ ($key == 0)? 'active' : '' }} show" id="{{ 'tab-'.$value->id }}" data-toggle="tab" href="{{ '#panel-tab-'.$value->id }}" role="tab" aria-controls="home" aria-selected="true">Kategori #1.{{ $number }}</a>
                    </li>
                    @php
                    $number++;
                    @endphp
                    @endforeach

                    @endif
                </ul>
                <div class="tab-content" id="myTabContent3">


                    @if(isset($parameter))
                    
                    @foreach($parameter as $key => $value)
                    <div class="tab-pane fade {{ ($key == 0)? 'active' : '' }} show" id="{{ 'panel-tab-'.$value->id }}" role="tabpanel" aria-labelledby="{{ 'tab-'.$value->id }}">


                        <div class="row">
                            <div>
                                <p>
                            {!! $value->parameter !!}
                        </p>
                            </div>
                        </div>
                        

                        

                    </div>
                    
                    @endforeach

                    @endif
                    
                    
                </div>
            </div>