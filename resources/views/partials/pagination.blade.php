<?php //dd($items); ?>
<div class="intro-y g-col-12 d-flex flex-wrap flex-sm-row flex-sm-nowrap align-items-center mt-5">
                    <nav class="w-full w-sm-auto me-sm-auto">
                        <ul class="pagination">
                              @if ($items->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                                </li>
                              @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $items->previousPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                            </li>
                            @endif

                             @php
                                $start = max(1, $items->currentPage() - 5);
                                $end = min($start + 9, $items->lastPage());
                            @endphp
                            
                            @foreach ($items->getUrlRange($start, $end) as $page => $url)
                                  <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}"> <a class="page-link" href="{{ $url }}">{{ $page }}</a> </li>
                             @endforeach
                            
                             @if($end < $items->lastPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $items->nextPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                            </li>
                             @else
                             <li class="page-item disabled">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                            </li>
                              @endif
                        </ul>
                    </nav>
                   <!--  <select class="w-20 form-select box mt-3 mt-sm-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select> -->
                </div>