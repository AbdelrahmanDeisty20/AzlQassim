@extends('layouts.app')

@section('title', 'المقالات والنصائح | عزل القصيم')

@section('content')
<div class="page active" id="page-blog">
    <!-- Breadcrumbs -->
    <div class="ph">
        <div class="con">
            <div class="bc">
                <a href="/" style="text-decoration:none;color:inherit;cursor:pointer">الرئيسية</a>
                <i class="fas fa-chevron-left"></i>
                <span>المقالات</span>
            </div>
            <h2>المقالات والنصائح</h2>
            <p>معلومات مفيدة في عالم العزل المائي والحراري</p>
        </div>
    </div>
    
    <!-- Blog posts grid -->
    <section class="sec">
        <div class="con">
            <div class="blog-g" id="blPg">
                @foreach($blogs as $bl)
                    <div class="blc">
                        <div class="blth">
                            @if(!empty($bl->img))
                                <img src="{{ $bl->img }}" onerror="this.style.display='none'">
                            @endif
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="blbd">
                            <span class="bl-tag">{{ $bl->cat ?? 'عزل' }}</span>
                            <h3>{{ $bl->title }}</h3>
                            <p>{{ $bl->summary }}</p>
                            <div class="bl-meta">
                                <span><i class="fas fa-calendar"></i>{{ $bl->date }}</span>
                                <span><i class="fas fa-clock"></i>5 دقائق</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
