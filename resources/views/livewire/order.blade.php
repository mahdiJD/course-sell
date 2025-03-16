
{{-- <div class="container d-flex ">
    <div class="checkout-container">
        <h2 class="text-center card-title mb-4">تصفیه حساب</h2>
        <form>
            <div class="mb-3">
                <label class="form-label">نام و نام خانوادگی</label>
                <input type="text" class="form-control" placeholder="نام خود را وارد کنید">
            </div>
            <div class="mb-3">
                <label class="form-label">ایمیل</label>
                <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید">
            </div>
            <div class="mb-3">
                <label class="form-label">آدرس</label>
                <textarea class="form-control" rows="3" placeholder="آدرس خود را وارد کنید"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">روش پرداخت</label>
                <select class="form-select">
                    <option>کارت اعتباری</option>
                    <option>پی پال</option>
                    <option>انتقال بانکی</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">پرداخت و تکمیل خرید</button>
        </form>
    </div>
    <div class="container">
        <figure class="figure">
            <img src="..." class="img-thumbnail" alt="...">
            <figcaption class="figure-caption">A caption for the above image.</figcaption>
          </figure>
    </div>
</div> --}}

{{-- <div class="container">
    <div class="col">
        df
    </div>

</div> --}}

<main class="container">

    <style>
        .check-out{
            width: 70%;
        }
        .sidebar1 {
            float: right;
            height: 30%;
            width: 25%;
            /* background-color: #409aee; */
            padding: 20px;
            border-radius: 5px;

        }
        .main-content1 {
            float: left;
            width: 70%;
            padding: 20px;
            box-sizing: border-box;
        }
        .course-box1 {
            background-color: #409aee;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .info-box1 {
            background-color: #555;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .clr{
            clear: both;
        }
    </style>

    <div class="sidebar1 ">
        <h3>تصفیه حساب</h3>
        <div class="course-box1">
            <h4>مبلغ کل</h4>
            <p>{{$price_bifore}}</p>
        </div>
        <div class="course-box1">
            <label>کد تخفیف را وارد کنید</label>
            <input type="text" name="discount" wire:model="discount">
            <button class="btn btn-blue-soft" wire:click='calculate'> تست کد</button>
        </div>
        <div class="course-box1">
            <h4>بعد از تخفیف</h4>
            <p>{{$price_after}}</p>
        </div>
    </div>

    <div class="main-content1">
        <h1>تصفیه حساب</h1>
        <div class="info-box1">
            <p>صبغ کل</p>
            <p>کد تخفیف</p>
            <p>جمع کل</p>
            <p>تعداد دوره‌ها</p>
        </div>
        <div class="info-box1">
            <h4>نام دوره</h4>
            <p>قیمت: ......</p>
            <p>توضیحات دوره: لورم اپیسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است.</p>
        </div>
    </div>
    <div class="clr"></div>

<main>

