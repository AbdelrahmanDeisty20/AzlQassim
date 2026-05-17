<footer>
    <div class="con">
        <!-- SEO keywords block -->
        <div class="ft-seo">
            <strong>كلمات مفتاحية:</strong> 
            افضل شركة عزل اسطح بالقصيم - أفضل شركة عزل أسطح بالقصيم - افضل شركة عزل الأسطح بالقصيم - افضل شركة عزل فوم للأسطح بالقصيم - افضل شركة عزل مائي وحراري بالقصيم - افضل شركة عزل اسطح ببريدة - أفضل شركة عزل أسطح ببريدة - افضل شركة عزل فوم ببريدة - افضل شركة عزل مائي وحراري ببريدة - افضل شركة عزل اسطح بحائل - أفضل شركة عزل أسطح بحايل - افضل شركة عزل فوم بحائل - افضل شركة عزل مائي وحراري بحائل
        </div>
        
        <div class="ft-g">
            <!-- Brand Identity -->
            <div class="ft-brand">
                <div class="logo" style="margin-bottom:11px">
                    <div class="logo-ic"><i class="fas fa-layer-group"></i></div>
                    <div>
                        <div class="logo-nm" id="ftNm">{{ $ftr['nm'] ?? 'عزل القصيم' }}</div>
                        <div class="logo-sb" style="color:var(--am2)">{{ $ftr['sb'] ?? 'أفضل شركة عزل أسطح' }}</div>
                    </div>
                </div>
                <p id="ftDs">{{ $ftr['d'] ?? 'شركة متخصصة في عزل الأسطح مائياً وحرارياً في القصيم وبريدة وحائل. ضمان حقيقي حتى 10 سنوات.' }}</p>
                <div class="sls">
                    @if(!empty($ftr['sn'])) <a href="{{ $ftr['sn'] }}" class="sl-a" id="ftSn" target="_blank"><i class="fab fa-snapchat"></i></a> @endif
                    @if(!empty($ftr['ig'])) <a href="{{ $ftr['ig'] }}" class="sl-a" id="ftIg" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                    @if(!empty($ftr['tw'])) <a href="{{ $ftr['tw'] }}" class="sl-a" id="ftTw" target="_blank"><i class="fab fa-twitter"></i></a> @endif
                    @if(!empty($ftr['yt'])) <a href="{{ $ftr['yt'] }}" class="sl-a" id="ftYt" target="_blank"><i class="fab fa-youtube"></i></a> @endif
                    @if(!empty($ftr['fb'])) <a href="{{ $ftr['fb'] }}" class="sl-a" id="ftFb" target="_blank"><i class="fab fa-facebook"></i></a> @endif
                    @if(!empty($ftr['tt'])) <a href="{{ $ftr['tt'] }}" class="sl-a" id="ftTt" target="_blank"><i class="fab fa-tiktok"></i></a> @endif
                </div>
            </div>
            
            <!-- Dynamic Navigation Links -->
            <div class="ft-col">
                <h4>الصفحات</h4>
                <ul id="ftPgs">
                    @if(isset($menus))
                        @foreach($menus as $m)
                            <li><a href="{{ $m->page == 'home' ? '/' : '/' . $m->page }}" style="text-decoration:none;color:inherit;cursor:pointer">{{ $m->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            <!-- Active Services Links -->
            <div class="ft-col">
                <h4>خدماتنا</h4>
                <ul id="ftSvcs">
                    @if(isset($globalServices))
                        @foreach($globalServices->slice(0, 6) as $svc)
                            <li><a href="/services/{{ $svc->id }}" style="text-decoration:none;color:inherit;cursor:pointer">{{ $svc->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            <!-- Core Company Coordinates -->
            <div class="ft-col">
                <h4>تواصل</h4>
                <ul>
                    <li>
                        <a id="ftPh" href="tel:{{ $contact['ph'] ?? '966500000000' }}" style="text-decoration:none;color:inherit">
                            <i class="fas fa-phone"></i>
                            <span id="ftPhT"> {{ $contact['ph'] ?? '0550000000' }}</span>
                        </a>
                    </li>
                    <li>
                        <a id="ftWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" style="text-decoration:none;color:inherit">
                            <i class="fab fa-whatsapp"></i> واتساب
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $contact['em'] ?? 'info@azlalqassim.com' }}" style="text-decoration:none;color:inherit">
                            <i class="fas fa-envelope"></i>
                            <span id="ftEmT"> {{ $contact['em'] ?? 'info@azlalqassim.com' }}</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fas fa-map-marker-alt"></i>
                            <span id="ftAdT"> {{ $contact['ad'] ?? 'بريدة، القصيم' }}</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fas fa-clock"></i>
                            <span id="ftHrT"> {{ $contact['hr'] ?? 'السبت-الخميس 7ص-10م' }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom copyright status -->
        <div class="ft-bot">
            <span id="ftCp">{{ $ftr['cp'] ?? '© 2025 عزل القصيم. جميع الحقوق محفوظة.' }}</span>
            <span>أفضل شركة عزل أسطح في القصيم وبريدة وحائل</span>
        </div>
    </div>
</footer>
