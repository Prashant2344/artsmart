@extends('website.app')

@section('title')
    Art Smart
@endsection

@section('content')

<section class="gallery-albums pad-bot inner-page pad-top">
    <div class="container">
        <div class="ad-form-wrap">

            <div class="row">
                <div class="up-details col-md-5">
                    <div class="up-details-in">
                        <h2>नमस्कार !</h2>
                        <h4>कृपया<a href="www.swadeshsandesh.com" traget="_blank"> www.swadeshsandesh.com</a> मा आफ्ना लेख तथा रचनाहरु प्रकाशित गर्न Sign Up Form मा आवश्यक सुचनाहरु उपलब्ध गराई दिनुहोला ।</h4>
                        <p>समाज प्रगतीशील र चलायमान जिवित प्रणाली हो । यसको लक्ष्य सदैव सकारात्मकता तर्फ तथा उच्चतम सभ्यता र सुन्दरता तर्फनै हुन्छ । हाम्रो समाज भर्खरैमात्र अघि बढ्न शुरु गर्दैछ । तसर्थ समाजका यि निहित सकारात्मकता सिमित वा भनौ अति नै न्युन छ ।
                        </p>

                        <p>

                            यस स्वदेशसन्देश डट कम अनलाईन म्यागजिन त्यै सिमित सकारात्मकतालाई सर्वव्यापी बनाएर हाम्रो समाजलाई हामीले चाहेको जस्तो, हामीले रुचाएको जस्तो कर्मठ, सुन्दर र सकारात्मक समाजमा रुपान्तरण गर्ने कैयन प्रयासहरु मध्यको एक प्रयासको शुरुवात हो ।
                        </p>

                        <h5>हामी विश्वस्त छौं, तपाईको अमुल्य लेख एवं रचना हामीलाई प्राप्त हुनेछ ।</h5>
                    </div>
                </div>
                <div class="up-form col-sm-7">
                    <h3 class="heading-mid" style="margin-bottom:15px;">Sign up</h3>
                    <form class="common-form" method="post" action="{{url('/signup')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- first group -->
                        <div class="form-groups">
                            <!-- name -->
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" name="fullname" value="">
                            </div>

                            <div class="form-group">
                                <label>Number:</label>
                                <input type="text" name="number" value="">
                            </div>

                            <!-- Company -->
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" value="">
                            </div>
                        </div>

                        <!-- third group -->
                        <div class="form-groups">
                            <!-- name -->
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password">
                            </div>

                            <!-- Company -->
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="password" name="password_confirmation">
                            </div>
                        </div>

                        <!-- third group -->
                        <div class="form-group single-input">
                            <label>Profile Image:</label>
                            <input type="file" name="image">
                            <button type="submit" class="form-btn">SEND <i class="fab fa-telegram-plane"></i></button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection