@extends('layouts.app', ['title' => 'About Us | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('content')
<div class="aboutus-page">
    <section class="aboutus-section">
        <div class="container">

            <div class="about-content">
                <h2>About Dream Chalets Engineering</h2>
                <p><strong>DREAM CHALETS ENGINEERING LIMITED</strong> is recently founded with a vision to share in the vastly growing construction industry in Tanzania and be one of the leading contractors in Tanzania Our core values of integrity, commitment, dedication and strive for client satisfaction are the key for success in this market. Our staff expertise varies in all fields required in the Civil & Building construction projects with blend of experiences and cultures which forms homogeneous work teams to deliver the requirements according to the best safety and quality standards.
                    We are well known for excellent services provided to their clients, unparalleled quality of work- manship and their timely completion of projects in a safely manner.</p>
            </div>

        </div>
    </section>
    <div class="section book-section mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-listing">
                        <h2>Our Services</h2>
                        <img src="{{ asset('assets/img/our_service.png')}}" alt="aboutus-03">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-content">
                        <p>
                            Dream Chalets Engineering Limited provides
                            the following services:</p>
                        <div class="footer-widget-list">
                            <ul>
                                <li>
                                    <p><span>Civil Works Construction Building Construction Mechanical Contractor</span></p>
                                </li>
                                <li>
                                    <p><span>Electrical Engineering and</span></p>
                                </li>
                                <li>
                                    <p><span>General Supply</span></p>
                                </li>
                            </ul>
                        </div>
                        <p class="mt-2">In the following sectors:</p>
                        <div class="footer-widget-list">
                            <ul>
                                <li>
                                    <p><span>Industrial</span></p>
                                </li>
                                <li>
                                    <p><span>Commercial</span></p>
                                </li>
                                <li>
                                    <p><span>Residential</span></p>
                                </li>
                                <li>
                                    <p><span>Leisure</span></p>
                                </li>
                                <li>
                                    <p><span>Religious</span></p>
                                </li>
                                <li>
                                    <p><span>Educational</span></p>
                                </li>
                                <li>
                                    <p><span>Other Special Works</span></p>
                                </li>
                            </ul>
                        </div>
                        <p class="mt-3">Our team members are highly respected for proven exper- tise and capabilities in their respective specialties and recognized for proven histories of award winning, ahead of schedule, and within budget completions on major projects.</p>
                        <p>The company employs top construction personnel with expertise in the respective fields and keen to introduce and incorporate latest technologies as we evolve and have well formulated plans to expand company's operations further.</p>
                        <p>Dream Chalets Engineering Limited was found to serve the client's needs in the best and efficient way and translate its vision to reality in the market.</p>
                        <p>This remarkable growth of the company within such a short period of time, clearly attributes to its workforce from Top Management all the way through to its highly skilled and dedicated staff and laborers. The company always aims to provide their clients with workmanship meeting interna- tional quality standards with its highly qualified local and international staff bringing together years of experience from all around the globe. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section partners-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="section-heading text-center">
                        <h2>Vision</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                    </div>
                    <p>We have grown to be a leader in our field because we build and nurture strong client relationships, we rise to any challenge and we value innovation and resourcefulness. We are committed to delivering a superior quality product in the shortest possible time frame maximising value for our clients.</p>
                    <blockquote class="blockquote">
                        <p>The Best Value comes from The Integrity of <strong>Sucessful & Working Perfectly</strong>. </p>
                    </blockquote>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="section-heading text-center">
                        <h2>Mission</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                    </div>
                    <p>We endeavor at all times to provide a com-prehensive service to our clients. We strive to complete projects timely and within budget. We promote strict adher- ence to quality, health and safety standards and we adhere to labor equity and encourage harmonious personnel relationships in order to promote team work among staff.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section partners-sec">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Objectives</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Our objective is to provide our clients with best quality final product that's why we call "Best and Quality Producers". Our emphasis is on clear communication and a follow-through procedure ensures that client's objectives are top priority in the plan- ning and execution of all our processes by including "Safety First"</p>
                    <p>Our Project management and execution philosophy is:</p>
                    <div class="footer-widget-list">
                        <ul>
                            <li>Create detail schedule and resources plan to meet client's project objective</li>
                            <li>Communicate clearly with all project stakeholders</li>
                            <li>Track project progress and fine-tune deviations</li>
                            <li>Professional and closely supervision on best quality of work done</li>
                            <li>Dealing with cost control [Cost minimising] while uplifting job quality</li>
                            <li>Complete the project on time</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section book-section-1 mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-listing text-white">
                        <h2 class="text-white">ENVIRONMENTAL, HEALTH AND SAFETY</h2>
                        <p><strong>Dream Chalets Engineering Limited:</strong> Dream Chalets Engineering Limited environment, health, and safety (EHS) policy and practices centre around a zero-harm philosophy towards people, host communities and the environment. Our operations outside Tanzania are governed by international standards, we consistently enforce a standard approach to Safety Health and Environment and does not compromise our standards of conduct when operating in other countries. The company's slogan "Safety First" is "Safety Always." programme is a non-negotiable minimum standard for all operational businesses and is driven at all levels throughout.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-content">
                        <img src="{{ asset('assets/img/env.png')}}" alt="aboutus-03">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="counter-sec">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                <div class="counter-box active flex-fill">
                                    <h4>A) ENVIRONMENTAL</h4>
                                    <div class="counter-value">
                                        <p>We promote energy efficiency by ensuring that our equipment fleet is well maintained and replaced on a regular basis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                <div class="counter-box active flex-fill">
                                    <h4>B) HEALTH</h4>
                                    <div class="counter-value">
                                        <p>Our Occupational Health & Safety unit provides sup- port in all aspects of health and safety relating to field and administrative operations. We are committed to ensuring the health and wellbeing of the public, the environment and all Junior Construction Company's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                <div class="counter-box active flex-fill">
                                    <h4>C) SAFETY</h4>
                                    <div class="counter-value">
                                        <p>Our entire workforces are well trained in Operational Safety, Fire safety, Accident handling, Fuel spillage, and other emergencies. We continuously conduct safety trainings on daily basis to our employees based on altered topics and issues just as with existing National Safety Regulations as spelled out by the Government and/ or other concerned authorities </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection