@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart mb-5">
      <section
        class="store-breadcrumb"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Name &amp; Seller</td>
                    <td>Price</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width: 30%">
                      <img
                        src="{{ asset('/') }}images/adv_1.png"
                        class="cart-image"
                        alt=""
                      />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Sofa Ternyaman</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 25%">
                      <div class="product-title">$1000</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 10%">
                      <a href="#" class="btn btn-danger"> Remove </a>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 30%">
                      <img
                        src="{{ asset('/') }}images/adv_2.png"
                        class="cart-image"
                        alt=""
                      />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Sofa Ternyaman</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 25%">
                      <div class="product-title">$1000</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 10%">
                      <a href="#" class="btn btn btn-danger"> Remove </a>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 30%">
                      <img
                        src="{{ asset('/') }}images/adv_3.png"
                        class="cart-image"
                        alt=""
                      />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Sofa Ternyaman</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 25%">
                      <div class="product-title">$1000</div>
                      <div class="product-subtitle">By Ama K</div>
                    </td>
                    <td style="width: 10%">
                      <a href="#" class="btn btn-danger"> Remove </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="addresone">Address 1</label>
                <input
                  type="text"
                  class="form-control"
                  id="addresone"
                  name="addresone"
                  value="Duta Cemara"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="addresone">Address 2</label>
                <input
                  type="text"
                  class="form-control"
                  id="addresTwo"
                  name="addreTwo"
                  value="Blok C2 No 34"
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Provice">Provice</label>
                <select name="Provice" id="Provice" class="form-control">
                  <option value="West Java">West Java</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="City">City</label>
                <select name="City" id="City" class="form-control">
                  <option value="Malang">Malang</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="addresone">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="PostalCode"
                  name="PostalCode"
                  value="65174"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="addresone">Country</label>
                <input
                  type="text"
                  class="form-control"
                  id="addresTwo"
                  name="addreTwo"
                  value="Blok C2 No 34"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="addresone">Phone Mobile</label>
                <input
                  type="text"
                  class="form-control"
                  id="addresTwo"
                  name="addreTwo"
                  value="Blok C2 No 34"
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Payment Information</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">10$</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">10$</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">10$</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">1000$</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <a
                href="/success.html"
                class="btn btn-success mt-4 px-4 btn-block"
                >Checkout</a
              >
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection
{{-- 
@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
        }
      });
    </script>
@endpush --}}