    <div class="card-serv col-lg-4 col-sm-6 col-12 position-relative p-0"data-aos="zoom-in-left"
        data-aos-duration="800">
        <div class="serv">
            <p class="icon">
                <span>{{ $loop->iteration }}</span>
            </p>
            <div class="d-inline-block">
                <h5 class="title">{{ $service->title }}</h5>
                <p>{{ $service->sup_title }}</p>
            </div>
            <p class="description">{{ $service->description }}</p>
        </div>
        <div class="serv-hover">
        </div>
    </div>
