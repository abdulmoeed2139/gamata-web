                    @foreach ($community as $item)
                        <div class="image-post">
                            <div class="wrapper">
                                <div class="row-1">
                                    <div class="pofile">
                                        <div class="image">
                                            <img src="{{ ($item['image1'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells') . '/' . $item['image1'] }}"
                                                alt="user">
                                        </div>
                                        <div class="name    ">
                                            <div class="text">
                                                {{ $item['posterName'] }}
                                            </div>
                                            <div class="date">
                                                {{ \Carbon\Carbon::parse($item['publish_DateTime'])->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#three_dot"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="row-2">
                                    <div class="text">
                                        {{ $item['name'] ?? 'Fresh, sustainable, and full of goodness. 💚 <span>#OrganicLiving  #FreshFromFarm  #GamataCares  #HealthyEating</span>' }}
                                    </div>
                                </div>
                                <div class="row-3">
                                    <div class="image">
                                        <img src="{{ ($item['imageUri'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells') . '/' . $item['cover_Image'] }}"
                                            alt="sdcv">
                                    </div>
                                </div>
                                @php
                                    if (!function_exists('number_format_short')) {
                                        function number_format_short($n, $precision = 1)
                                        {
                                            if ($n < 900) {
                                                $n_format = number_format($n, $precision);
                                                $suffix = '';
                                            } elseif ($n < 900000) {
                                                $n_format = number_format($n / 1000, $precision);
                                                $suffix = 'k';
                                            } elseif ($n < 900000000) {
                                                $n_format = number_format($n / 1000000, $precision);
                                                $suffix = 'M';
                                            } else {
                                                $n_format = number_format($n / 1000000000, $precision);
                                                $suffix = 'B';
                                            }

                                            if ($precision > 0) {
                                                $dotzero = '.' . str_repeat('0', $precision);
                                                $n_format = str_replace($dotzero, '', $n_format);
                                            }

                                            return $n_format . $suffix;
                                        }
                                    }
                                @endphp
                                <div class="row-4">
                                    <div class="col-1">
                                        <div class="box post-like" data-post-id="{{ $item['code'] }}">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#heart"></use>
                                                </svg>
                                            </div>
                                            <div class="text">{{ number_format_short($item['totalLikesCount']) }}</div>
                                        </div>
                                        <div class="box">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#msgs"></use>
                                                </svg>
                                            </div>
                                            <div class="text">{{ number_format_short($item['totalCommentsCount']) }}
                                            </div>
                                        </div>
                                        <div class="box"></div>
                                        <div class="box">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#share"></use>
                                                </svg>
                                            </div>
                                            <div class="text">{{ number_format_short($item['totalsharesCount'] ?? 0) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <form class="commentForm d-flex com">
                                            @csrf
                                            <input type="text" class="comment" name="comment"
                                                placeholder="Write Your Comment Here">
                                            <input type="hidden" id="fK_UserID" name="fK_UserID"
                                                value="{{ $item['fK_UserID'] }}">
                                            <input type="hidden" id="is_delete" name="is_delete"
                                                value="{{ $item['isdelete'] ?? false }}">
                                            <input type="hidden" id="FK_Post_Code" name="FK_Post_Code"
                                                value="{{ $item['code'] }}">
                                            @php $time = Carbon\Carbon::now()->toDateString(); @endphp
                                            <input type="hidden" name="dateTime" value="{{ $time }}">
                                            <button type="submit" class="icon"
                                                style="border:none; background:none; cursor:pointer;">
                                                <svg class="submitBtn">
                                                    <use xlink:href="#send"></use>
                                                </svg>
                                                <div class="loader" style="display: none;"></div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="image-post comment-container">
                            <div class="wrapper">
                                <div class="row-5">
                                    <div class="wrap">
                                        <ul class="main-cmnt">
                                            <li class="has-sub">
                                                @forelse ($item['comments'] as $comment)
                                                <div class="wrp comment-item">
                                                        <div class="rw-1">
                                                            <div class="image">
                                                                <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="user">
                                                            </div>
                                                        </div>
                                                        <div class="rw-2">
                                                            <div class="cl-1">
                                                                <div class="name">{{ $comment['usersName'] }}</div>
                                                                <div class="time">{{ \Carbon\Carbon::parse(\Carbon\Carbon::parse($comment['commented_DateTime'])->format('Y-m-d H:i:s'))->diffForHumans() }}
                                                                                                    </div>
                                                            </div>
                                                            <div class="cl-2">
                                                                <div class="comment">{{ $comment['comment'] }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="wrp comment-item show no-commentt">
                                                        <div class="rw-2">
                                                            <div class="cl-1"><div class="name">Comment Not Yet</div></div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row-6">
                                    <div class="sub-btn">
                                        <a href="#" id="toggle-comments">Show more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
