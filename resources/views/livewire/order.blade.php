
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
    @if ($myAlert)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          An example danger alert with an icon
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" wire:click=''></button>
      </div>
    @endif
    <div class="sidebar1 ">

        <h3>تصفیه حساب</h3>
        <div class="course-box1">
            <h4>مبلغ کل</h4>
            <p>{{$price_bifore}}</p>
        </div>
        <div class="course-box1">
            <label>کد تخفیف را وارد کنید</label>
            <input type="text" name="discount" wire:model="discount">
            <button class="btn btn-blue-soft" wire:click='calculate()'> تست کد</button>
        </div>
        <div class="course-box1">
            <h4>بعد از تخفیف</h4>
            <p>{{$price_after}}</p>
        </div>
        <form action="{{route('invoce')}}" method="POST">
            @csrf
            <input type="hidden" name="request_discount" wire:model="discount" value="{{$discount}}">
            <button type="submit" class="btn btn-primary" >رفتن به درگاه پرداخت</button>
        </form>

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

