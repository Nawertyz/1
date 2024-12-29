@extends('Layout.App')
@section('title', 'Get UID')

@section('content')
<div class="container-fluid">
                            <div class="card d-none d-md-block" style="max-height:300px;overflow-y:scroll">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Cập nhật mới <img src="https://i.imgur.com/m0Br30Y.gif"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="timeline">
                                        <ul class="timeline-list">
                                             @foreach ($activities as $item)
                                                                                        <li class="timeline-item">
                                                <div class="timeline-status bg-warning"></div>
                                                <div class="timeline-date text-bold" style="color:brown"> {{ date('d  ', strtotime($item->created_at)) }}/{{ date(' m ', strtotime($item->created_at)) }}<em class="icon ni ni-forward-arrow-fill"></em>
                                                </div>
                                                <div class="timeline-data">
                                                    <span class="timeline-title">{!!  $item->content !!}</span>
                                                </div>
                                            </li>
                                                                  @endforeach                     
                                                                                       
                                                                                    </ul>
                                    </div>
                                </div>
                            </div>