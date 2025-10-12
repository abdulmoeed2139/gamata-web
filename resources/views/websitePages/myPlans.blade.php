@extends('websitePages.master')
@section('content')

<style>

    .plan-card h3 ,.plan-card p , .plan-start-date, .plan-end-date{
        font-family:'Roboto',serif;
        }
        .plan-card p{
        color:#757575;
        }
    .plan-card {
      display: flex;
      border: 1px solid #ccc;
      margin: 16px auto;
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .plan-card img {
      width: 160px;
      height: auto;
      border-radius: 8px;
      padding:25px;
    }

    .plan-card-content {
      margin-left: 16px;
      flex: 1;
      display: flex;
    flex-direction: column;
    justify-content: center;
    padding:25px 27px;
    padding-bottom:30px;
    }

    .plan-card-content h3 {
      margin: 0;
      font-size: 1.3rem;
    }

    .plan-card-content p {
      margin: 8px 0;
      font-size: 0.95rem;
      color: #555;
    }

    .plan-button-date-container {
      display: flex;
      /* align-items: center; */
      justify-content: space-between;
      gap:20px;
      margin-top: 10px;
    }



    .plan-card button{
    padding:12px;
    font-size:16px
    background:#e3e3e3;
    border-radius:8px;
    cursor: pointer;
    border: 1px solid #000;

    }

    .plan-progress-bar {
      height: 6px;
      background-color: #eee;
      margin-top: 10px;
      border-radius: 4px;
      overflow: hidden;
    }

    .plan-progress {
      height: 100%;
      background-color: green;
      transition: width 0.5s ease;
    }

    .plan-date {
      font-size: 0.85rem;
      color: #333;
      display: flex;
      align-items: center;
      gap: 5px;
      justify-content: space-between;
      position: absolute;
      width:100%;
      bottom: -3px;
    }

    .plan-progress.expired {
      background-color: red;
    }

    .plan-start-date{
        display: flex;
        align-items:center;
        gap:10px;

    }

    .plan-start-date, .plan-end-date{
        font-weight:600;
        font-size:16px;
    }
.product-toolbar {
  display: flex;
  align-items: center;
  gap: 10px;
  justify-content: end;
}

.product-search
 {
    padding: 12px 15px;
    border: 1px solid #d9d9d9;
    border-radius: 6px;
    outline: none;
    width: 250px;
    font-size: 14px;
    text-align:center;
}

.product-add-btn {
  background-color: #8cc63f;
  color: #fff;
  border: none;
  padding: 8px 20px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  font-weight: bold;
  transition: background 0.3s;
}

.product-add-btn:hover {
  background-color: #7ab634;
}

.product-calendar-btn {
  background: none;
  border: none;
  cursor: pointer;
  padding: 6px;
}

.product-calendar-btn svg {
  width: 48px;
  height: 48px;
}

.product-toolbar .auth-btn{
    color:#fff;
    line-height: 15px;
}


.plan-listing.plans{
padding-bottom:80px !important;
}

.progress{
    width:70%;
}

@media screen and (max-width:767px){

.product-toolbar , .plan-card ,.plan-button-date-container{
flex-direction:column;
}

.plan-card img{
padding:12px;
}


.plan-card-content{
padding:20px;
margin:0;
padding-bottom:90px;
}


.plan-date {
    bottom: -39px;
}

.progress{
    width:100%;
}

}

</style>



<section>
    <!-- Banner Section (AS IS) -->
    <div class="product-banner">
        <div class="wrapper">
            <div class="breadcrum">
                <a href="{{ url(app()->getLocale().'/index') }}" class="link">Home</a>
                <svg><use xlink:href="#breadcrum"></use></svg>
                <div class="current">My Plan</div>
            </div>
            <div class="heading">
                Planned Your Harvest Today
            </div>
            <div class="desc">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard  dummy text ever since the 1500s, when an unknown printer took a galley
            </div>
        </div>
    </div>



    <!-- Cards Section -->
    <section class="product-listing plans">
        <div class="wrapper">

            <div class="col-12">
                <!-- Card 1 -->
                  <div class="product-toolbar">
                    <input type="text" class="product-search" placeholder="Search">
                    <button class="auth-btn">Add Product</button>
                    <button class="product-calendar-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="448" height="448" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>

                    </button>
                    </div>


                <div class="plan-card" data-start="2025-09-01" data-end="2026-03-01" style="position:relative;">
                <img src="{{asset('assets/Images/items/1.png')}}" alt="Banana">
                <div class="plan-card-content">
                        <h3>Onion</h3>
                        <p>Body text for whatever you’d like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</p>

                        <div class="plan-button-date-container">
                            <button>View More..</button>
                            <div class="progress" style="position:relative; ">
                            <div class="plan-progress-bar"  >
                                <div class="plan-progress" style="width:10%; "></div>
                                <div class="plan-date">

                                <span class="plan-start-date"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                01.09.2025</span>  <span class="plan-end-date">01.03.2026</span>
                                </div>
                            </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Card 2 -->
                <div class="plan-card" data-start="2025-09-01" data-end="2026-03-01" style="position:relative;">
                <img src="{{asset('assets/Images/items/5.png')}}" alt="Banana">
                    <div class="plan-card-content">
                        <h3>Sweet Potatoes</h3>
                        <p>Body text for whatever you’d like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</p>

                        <div class="plan-button-date-container">
                            <button>View More..</button>
                             <div class="progress" style="position:relative; ">                            <div class="plan-progress-bar" >
                                <div class="plan-progress" style="width:60%; "></div>
                                <div class="plan-date">
                                <span class="plan-start-date"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                01.09.2025</span> <span class="plan-end-date">01.03.2026</span>
                                </div>
                            </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Card 3 -->
                <div class="plan-card" data-start="2025-09-01" data-end="2026-03-01" style="position:relative;">
                    <img src="{{asset('assets/Images/items/4.png')}}" alt="Cinnamon Sticks">
                    <div class="plan-card-content">
                        <h3>Cinnamon Sticks</h3>
                        <p>Body text for whatever you’d like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</p>

                        <div class="plan-button-date-container">
                            <button>View More..</button>
                                <div class="progress" style="position:relative; ">                            <div class="plan-progress-bar">
                                <div class="plan-progress"  style="width:80%; "></div>
                                <div class="plan-date">
                                <span class="plan-start-date"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>01.09.2025</span>
                                    <span class="plan-end-date">01.03.2026</span>
                                </div>
                            </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<footer>

        <div class="wrapper">
            <div class="col-1">
                <div class="row-1">
                    <div class="box-1">
                        <svg>
                            <use xlink:href="#news_icon"></use>
                        </svg>
                        <div class="text">
                            Newsletter Signup
                            <span>Uptodate with our latest news and insights</span>
                        </div>
                    </div>
                    <div class="box-2">
                        <form action="/" method="post">
                            <input type="email" name="newsletter-email" id="email"
                                placeholder="Enter Your Email Here" required>
                        </form>
                    </div>
                    <div class="box-3">
                        <a href="#" class="common-btn-1">
                            <svg>
                                <use xlink:href="#btn_arr"></use>
                            </svg>
                            Subscribe
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="wrapper-1">
                    <div class="row-1">
                        <div class="box">
                            <ul class="footer-menu">
                                <a href="#" class="active">
                                    <li>Home</li>
                                </a>
                                <a href="#">
                                    <li>Shop</li>
                                </a>
                                <a href="#">
                                    <li>Community</li>
                                </a>
                                <a href="#">
                                    <li>Journal</li>
                                </a>
                                <a href="#">
                                    <li>Contact Us</li>
                                </a>
                            </ul>
                        </div>
                        <div class="box-1">
                            <div class="title">
                                Head Office
                            </div>
                            <div class="text">
                                No 100/0, Sample Name Road, Marine Drive, Colombo 05
                            </div>
                        </div>
                        <div class="box-2">
                            <div class="title">
                                Email
                            </div>
                            <div class="text">
                                <a href="mailto:information@gamataecommerce.com">information@gamataecommerce.com</a>
                            </div>
                        </div>
                        <div class="box-3">
                            <div class="title">
                                Contact
                            </div>
                            <div class="text">
                                <a href="tel:0777 000 000">0777 000 000</a>
                                <a href="tel:0112 000 000">0112 000 000</a>
                            </div>
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="box-1">
                            <ul class="footer-menu">
                                <a href="#" class="active">
                                    <li>Home</li>
                                </a>
                                <a href="#">
                                    <li>Shop</li>
                                </a>
                                <a href="#">
                                    <li>Community</li>
                                </a>
                                <a href="#">
                                    <li>Journal</li>
                                </a>
                                <a href="#">
                                    <li>Contact Us</li>
                                </a>
                            </ul>
                        </div>
                        <div class="box-2">
                            <div class="title">We Are Available on</div>
                            <div class="image">
                                <img src="{{ asset('assets/Images/playstore.png') }}" alt="playsore">
                                <img src="{{ asset('assets/Images/appstore.png') }}" alt="appstore">
                            </div>
                        </div>
                        <div class="box-3">
                            <ul>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#fb_icon"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#x_icon"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#yt"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#linkedin"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#insta"></use>
                                        </svg>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="row-3">
                        <div class="cont">
                            <div class="copyright">© 2024 Gamata.lk, All Rights Reserved </div>
                            <div class="author">Designed and Developed by <a href="https://www.antyrasolutions.com"
                                    target="_blank">Antyra</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chat Modal -->
        <div class="chat-box" id="chatModal">
            <div class="message-inner">
                <div class="top-bar">
                    <div class="minus"></div>
                    <div class="cross" id="closeChat">X</div>
                </div>
                <div class="bottom-cont">
                    <div class="chat-display">
                        <div class="chat-bot-message">
                            <img class="chat-bot-img" src="{{ asset('assets/Images/gamata-chat-icon.png') }}" alt="chat-bot-icon">
                            <div class="chat-bot-text">
                                Welcome to Gamata! How can I help you today?
                            </div>
                        </div>
                    </div>
                    <div class="chat-type-area">
                        <form id="chat_form" onsubmit="return false;">
                            <input id="text-message" type="text" placeholder="Type here...">
                            <button type="submit">
                                <i class="fas fa-arrow-up"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer>

<script>
  document.querySelectorAll('.plan-card').forEach((card, index) => {
    const progressBar = card.querySelector('.plan-progress');

    // Har card ke liye fixed percentages
    const fixedPercentages = [10, 60, 80];

    if (fixedPercentages[index] !== undefined) {
      const percentage = fixedPercentages[index];

      // Width set karo
      progressBar.style.width = percentage + "%";

      // Color set karo percentage ke hisaab se
      if (percentage <= 30) {
        progressBar.style.backgroundColor = "#007aff";
      } else if (percentage <= 70) {
        progressBar.style.backgroundColor = "#34c759";
      } else if (percentage < 100) {
        progressBar.style.backgroundColor = " #ff3b30";
      } else if (percentage === 100) {
        progressBar.style.backgroundColor = "#ff3b30";
      }
    }

    // Agar percentage 100% ho jaye to expired class lagao
    if (fixedPercentages[index] === 100) {
      progressBar.classList.add("expired");
    }
  });
</script>


@endsection
