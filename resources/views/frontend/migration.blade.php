@extends('frontend.app')
@section('content')

    <div class="elearning-page-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="found-jobs-count-wrap e-learning-top d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <h3>Migration</h3>
                        <form class="find-a-jobs-wrap" action="{{ route('visa.migration') }}" method="GET">
                            <div class="input-group search-jobs e-learning-input">
                                <div class="search-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M21.0002 21L16.6572 16.657M16.6572 16.657C17.4001 15.9141 17.9894 15.0322 18.3914 14.0616C18.7935 13.0909 19.0004 12.0506 19.0004 11C19.0004 9.94942 18.7935 8.90911 18.3914 7.93848C17.9894 6.96785 17.4001 6.08591 16.6572 5.34302C15.9143 4.60014 15.0324 4.01084 14.0618 3.6088C13.0911 3.20675 12.0508 2.99982 11.0002 2.99982C9.9496 2.99982 8.90929 3.20675 7.93866 3.6088C6.96803 4.01084 6.08609 4.60014 5.34321 5.34302C3.84288 6.84335 3 8.87824 3 11C3 13.1218 3.84288 15.1567 5.34321 16.657C6.84354 18.1574 8.87842 19.0002 11.0002 19.0002C13.122 19.0002 15.1569 18.1574 16.6572 16.657Z"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="find_job"
                                    class="form-control"
                                    placeholder="Search by Keywords"
                                    value="{{ request('find_job') }}"
                                />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12 order-2 order-md-1">
                    <div class="row">
                        @foreach($migration as $migrationData)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="learning-card">
                                    <div class="learning-card-image">
                                        <a href="{{route('visa.migration.details',$migrationData->id)}}">
                                            <img src="{{asset('images/migration/'. $migrationData->image )}}" alt="">
                                        </a>
                                    </div>
                                    <div class="learning-card-content">
                                        <div class="top">
                                            <a href="{{route('visa.migration.details',$migrationData->id)}}">
                                                <h3>{{$migrationData->title}}</h3>
                                            </a>
                                            <p>
                                                {{ \Illuminate\Support\Str::limit(strip_tags($migrationData->details), 150) }}
                                            </p>
                                            <div class="deadline d-flex align-items-center">
                                                <svg
                                                    width="18"
                                                    height="20"
                                                    viewBox="0 0 18 20"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M16 18H2V7H16V18ZM13 0V2H5V0H3V2H2C0.89 2 0 2.89 0 4V18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C16.5304 20 17.0391 19.7893 17.4142 19.4142C17.7893 19.0391 18 18.5304 18 18V4C18 2.89 17.1 2 16 2H15V0H13ZM14 11H9V16H14V11Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($migrationData->migration_date)->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="register-now">
                                        <a href="{{route('visa.migration.details',$migrationData->id)}}">Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 order-1 order-md-2">
                    <div class="category_wrap section-heading">
                        <h2>Category</h2>
                        <ul>
                            <li>
                                <a href="{{ route('visa.migration') }}"
                                   class="{{ request('category_id') ? '' : 'active-category' }}">
                                    All Categories
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('visa.migration', ['category_id' => $category->id]) }}"
                                       class="{{ request('category_id') == $category->id ? 'active-category' : '' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
            <div class="pagination-wrapper">
                {{ $migration->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
