@extends('website.master')

@section('content')


    <main role="main" id="app">


        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <section id="sidebar">
                            
                            <div class="filter-container">
                                <form>
                                    <div class="search-field mb-5">
                                        <input type="text" @input="lol($event)" class="filter-text" name="keyword" placeholder="Search...">
                                        <i class="tutor-icon-magnifying-glass-1"></i>
                                    </div>
                                    <div>
                                        <div>
                                            <h4>Categories</h4>
                                            @foreach ($categories as $category)

                                                <div class="filter-nested-terms">
                                                    <label>
                                                        <input type="checkbox" class="filter-category"
                                                            name="filter-category[]" value="{{ $category->id }}"
                                                            @click="lol($event, 'category')">&nbsp;
                                                        {{ $category->name }} </label>

                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                    <div>
                                        <div>
                                            <h4>Level</h4>
                                            @foreach ($levels as $key => $level)

                                                <label>
                                                    <input type="checkbox" class="filter-level" name="filter-level" @click="lol($event)"
                                                        value="{{ $key }}">&nbsp;
                                                    {{ $level }}
                                                </label>
                                                <br>
                                            @endforeach

                                        </div>
                                        <div>
                                            <h4>Time</h4>
                                            <label>
                                                <input type="checkbox" class='filter-time' @click="lol($event)" value="-4">&nbsp;
                                                Less Than 4 hours</label>
                                            <br>
                                            <label>
                                                <input type="checkbox" class='filter-time' @click="lol($event)" value="-8">&nbsp;
                                                Less Than 8 hours</label>
                                            <label>
                                                <input type="checkbox" class='filter-time' @click="lol($event)" value="+8">&nbsp;
                                                More Than 8 hours</label>
                                        </div>
                                    </div>
                                    <div class="tutor-clear-all-filter">
                                        <a href="#" onclick="window.location.reload()">
                                            <i class="tutor-icon-cross"></i> Clear All Filter
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </section>

                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-4" v-for="course in courses" :key="course.id">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                    alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                                    src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17e49022e39%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17e49022e39%22%3E%3Crect%20width%3D%22288%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.82500076293945%22%20y%3D%22119.24000034332275%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                    data-holder-rendered="true">
                                <div class="card-body">
                                    <p class="card-text">@{{ course.name }}.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">@{{ course.category.name }}</button>
                                        </div>
                                        <small class="text-muted">@{{course.hours}} Hours</small>
                                        <small class="text-muted">@{{course.levels}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> --}}
                              
                              <li v-for="link in links" v-bind:class="{'active':link.active, 'page-item':true}"><a :value="link.url" class="page-link" v-html="link.label" @click="lol($event)"></a></li>
                              
                              {{-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                courses: [], 
                links: [], 
                data:[]
            },
            beforeMount(){
                this.lol()
            },
            methods: {
                lol(event=null) {
                    target = event?$(event.target):null
                    categories = []
                    selected_categories = $("input.filter-category:checked")
                    for (let i = 0; i < selected_categories.length; i++) {
                        const selected_category = selected_categories[i];
                        categories.push(selected_category.value)
                    }
                    levels = []
                    selected_levels = $("input.filter-level:checked")
                    for (let i = 0; i < selected_levels.length; i++) {
                        const selected_level = selected_levels[i];
                        levels.push(selected_level.value)
                    }

                    times = $("input.filter-time")
                    if (target && target.hasClass('filter-time')) {
                        for (let i = 0; i < times.length; i++) {
                            time = times[i];
                            $(time).prop("checked", false);
                        }
                        target.prop("checked", true);
                    }
                    selected_time=$("input.filter-time:checked").val()

                    page=1
                    if (target && target.hasClass('page-link')) {
                        page= ($(target).attr('value')).split('=')[1]
                        console.log(($(target).attr('value')).split('='));
                        // page=($(target).attr('value'));
                    }
                    filtertext=$('.filter-text').first().val();
                    data = {}
                    data.filtertext=filtertext;
                    data.page=page
                    data.categories = categories
                    data.time=selected_time
                    data.levels=levels

                    $.ajax({
                        url: '/api/courses',
                        data: data
                    }).done(data => {
                        this.courses = data.data; // 'this' points to outside scope
                        this.data = data; 
                        this.links = data.meta.links; 
                    });

                }
            }
        })
    </script>

@endpush
