
    <!--start main content-->
<main class="page-content">
  <h4 class="mb-3 text-uppercase text-center" style="font-family: 'Montserrat', sans-serif; font-weight:700;">Affiliated Churches</h4>
  <div class="card">
    <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="8000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row d-flex">
              <div class="col-3">
                <a class="button text-black" href="profile">
                  <div class="card h-auto">
                    <img src="views/images/ch1.jpg" class="card-img-top" style="height:350px;" alt="...">
                    <div class="card-body" style="height:150px;">
                      <h5 class="card-title">OUR LADY OF THE MIRACULOUS MEDAL PARISH</h5>
                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <div class="card h-auto">
                  <img src="views/images/sanseb.jpg" class="card-img-top" style="height:350px;" alt="...">
                  <div class="card-body" style="height:150px;">
                    <h5 class="card-title">SAN SEBASTIAN CATHEDRAL</h5>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Rizal St., Bacolod City</span>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card">
                  <img src="views/images/lupit.jpg" class="card-img-top" style="height:350px;" alt="...">
                  <div class="card-body" style="height:150px;">
                    <h5 class="card-title">LUPIT CHURCH</h5>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Lizares St., Bacolod City</span>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card">
                  <img src="views/images/sanAntonio.jpg" class="card-img-top" style="height:350px;" alt="...">
                  <div class="card-body" style="height:150px;">
                    <h5 class="card-title">SAN ANTONIO ABAD CHURCH</h5>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Lacson St., Bacolod City</span>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row d-flex">
                <div class="col-3">
                  <a class="button text-black" href="profile">
                    <div class="card h-auto">
                      <img src="views/images/ch1.jpg" class="card-img-top" style="height:350px;" alt="...">
                      <div class="card-body" style="height:150px;">
                        <h5 class="card-title">OUR LADY OF THE MIRACULOUS MEDAL PARISH</h5>
                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
      </div>
    </div>
  </div>

  <div class="row border-top ">

<div class="col-6 mt-3">
    <div class=" justify-content-start align-items-start  d-flex">
      <h4 class="mb-0 text-uppercase text-left" style="font-family: 'Montserrat', sans-serif; font-weight:700;">Explore</h4>
    </div>
  </div>
  
<div class="col-6 mt-3 mb-3">
        <div class="d-flex justify-content-end align-items-end">
            <div class="input-group w-50 text-right">
                <span class="input-group-text bg-white"><i class="bx bx-search"></i></span>
                <input type="search" id="searchQuery" class="form-control" placeholder="Search Churches">
                <ul id="searchResults" class="list-group mt-5 dropdown-menu" style="display: none;"></ul>
            </div>
        </div>
    </div>
</div>
  
<div id="churchResults"></div>
</main>
