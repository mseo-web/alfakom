@extends('layouts.front')
@section('title','Контакты')
@section('content')

<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="d-flex align-items-center justify-content-center">
            <h1>Контакты</h1>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Наш адрес</h3>
              <p>Республика Казахстан, г. Павлодар</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Наш Email</h3>
              <p>mihas-ox7-74@mail.ru</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Наш телефон</h3>
              <p>+77088210530</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-12">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8182.658543007002!2d76.96528683783558!3d52.28713847593566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2skz!4v1590232255628!5m2!1sru!2skz" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection