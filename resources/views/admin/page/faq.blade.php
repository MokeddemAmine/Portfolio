@extends('admin.layouts.app')
@section('title','dashboard faq')
    
@section('content')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>FAQ</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Pages
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">FAQ</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!--faq-contant-start-->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card card-statistics faq-contant p-0 p-sm-4">
                                    <div class="card-body">
                                        <div class="tab nav-center">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="research-tab" data-toggle="tab" href="#research" role="tab" aria-controls="research" aria-selected="true"> Research</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab" aria-controls="design" aria-selected="false"> Design
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="develop-tab" data-toggle="tab" href="#develop" role="tab" aria-controls="develop" aria-selected="false">
                                                        Develop </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="result-tab" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="false"> Result
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="CSS3-tab" data-toggle="tab" href="#CSS3" role="tab" aria-controls="CSS3" aria-selected="false"> CSS3 </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="HTML5-tab" data-toggle="tab" href="#HTML5" role="tab" aria-controls="HTML5" aria-selected="false"> HTML5
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="jquery-tab" data-toggle="tab" href="#jquery" role="tab" aria-controls="jquery" aria-selected="false"> jquery
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show pt-20 active" id="research" role="tabpanel">
                                                    <div class="accordion" id="accordionsimplefill">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Quick Response Time</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse" class="collapse show" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <p>Motivation cannot be an external force, it must
                                                                        come from within as the natural product of your
                                                                        desire to achieve something and your belief
                                                                        that you are capable to succeed at your goal.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Experienced
                                                                        Professionals</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse2" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <p>There are many people in the world with amazing
                                                                        talents who realize only a small percentage of
                                                                        their potential. We all know people who live
                                                                        this truth.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Maximum Query Solved</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse3" class="collapse" data-parent="#accordionsimplefill">
                                                                <div class="card-body">
                                                                    <p>Text of the printin a galley of type and bled it
                                                                        to a type specimen book. It has survived not
                                                                        only five centuries make Lorem Ipsum is simply
                                                                        dummy.Success isn’t really that difficult.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="design" role="tabpanel">
                                                    <div class="accordion" id="accordionsimpleborder">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse01" class="btn-block text-left text-white acd-heading" data-toggle="collapse">1. Making the decision</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse01" class="collapse show" data-parent="#accordionsimpleborder">
                                                                <div class="card-body">
                                                                    <p>
                                                                        We also know those epic stories, those
                                                                        modern-day legends surrounding the early
                                                                        failures of such supremely successful folks as
                                                                        Michael Jordan and Bill Gates. We can look a
                                                                        bit further back in time to Albert Einstein or
                                                                        even further back to Abraham Lincoln.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse02" class="btn-block text-left text-white acd-heading collapsed" data-toggle="collapse">2. Developing the Vision</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse02" class="collapse" data-parent="#accordionsimpleborder">
                                                                <div class="card-body">
                                                                    <p>
                                                                        Positive pleasure-oriented goals are much more
                                                                        powerful motivators than negative fear-based
                                                                        ones. Although each is successful separately,
                                                                        the right combination of both is the most
                                                                        powerful motivational force known to humankind.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse03" class="btn-block  text-left text-white acd-heading collapsed" data-toggle="collapse">3. Taking Action</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse03" class="collapse" data-parent="#accordionsimpleborder">
                                                                <div class="card-body">
                                                                    <p>The first thing to remember about success is
                                                                        that it is a process – nothing more, nothing
                                                                        less. There is really no magic to it and it’s
                                                                        not reserved only for a select few people. As
                                                                        such, success really has nothing to do with
                                                                        luck, coincidence or fate. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="develop" role="tabpanel">
                                                    <div class="accordion" id="accordionfillborderradius">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse3-1" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Many Style Available</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse3-1" class="collapse show" data-parent="#accordionfillborderradius">
                                                                <div class="card-body">
                                                                    <p>The sad thing is the majority of people have no
                                                                        clue about what they truly want. They have no
                                                                        clarity. When asked the question, responses
                                                                        will be superficial at best, and at worst, will
                                                                        be what someone else wants for them.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse3-2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Parallax Sections</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse3-2" class="collapse" data-parent="#accordionfillborderradius">
                                                                <div class="card-body">
                                                                    <p>The best way is to develop and follow a plan.
                                                                        Start with your goals in mind and then work
                                                                        backwards to develop the plan. What steps are
                                                                        required to get you to the goals? Make the plan
                                                                        as detailed as possible. Try to visualize and
                                                                        then plan for, every possible setback.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse3-3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Unlimited layouts</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse3-3" class="collapse" data-parent="#accordionfillborderradius">
                                                                <div class="card-body">
                                                                    <p>Commit the plan to paper and then keep it with
                                                                        you at all times. Review it regularly and
                                                                        ensure that every step takes you closer to your
                                                                        Vision and Goals. If the plan doesn’t support
                                                                        the vision then change it!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="result" role="tabpanel">
                                                    <div class="accordion" id="accordionborderradius">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse4-1" class="btn-block text-left text-white acd-heading" data-toggle="collapse">1. Fast Customer support</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse4-1" class="collapse show" data-parent="#accordionborderradius">
                                                                <div class="card-body">
                                                                    <p>Focus is having the unwavering attention to
                                                                        complete what you set out to do. There are a
                                                                        million distractions in every facet of our
                                                                        lives. Telephones and e-mail, clients and
                                                                        managers, spouses and kids, TV, newspapers and
                                                                        radio – the distractions are everywhere and
                                                                        endless.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse4-2" class="btn-block text-left text-white acd-heading collapsed" data-toggle="collapse">2. Build websites easily</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse4-2" class="collapse" data-parent="#accordionborderradius">
                                                                <div class="card-body">
                                                                    <p>Everyone wants a piece of us and the result can
                                                                        be totally overwhelming.you should consider
                                                                        developing an action orientation that will keep
                                                                        you motivated to move forward at all times.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#collapse4-3" class="btn-block  text-left text-white acd-heading collapsed" data-toggle="collapse">3. Customizability</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse4-3" class="collapse" data-parent="#accordionborderradius">
                                                                <div class="card-body">
                                                                    <p>Making a decision to do something – this is the
                                                                        first step. We all know that nothing moves
                                                                        until someone makes a decision. The first
                                                                        action is always in making the decision to
                                                                        proceed. This is a fundamental step, which most
                                                                        people overlook.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="CSS3" role="tabpanel">
                                                    <div class="accordion" id="accordionsimple1">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#CSS31" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Quick Response Time</a>
                                                                </h5>
                                                            </div>
                                                            <div id="CSS31" class="collapse show" data-parent="#accordionsimple1">
                                                                <div class="card-body">
                                                                    <p>Motivation cannot be an external force, it must
                                                                        come from within as the natural product of your
                                                                        desire to achieve something and your belief
                                                                        that you are capable to succeed at your goal.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#CSS32" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Experienced
                                                                        Professionals</a>
                                                                </h5>
                                                            </div>
                                                            <div id="CSS32" class="collapse" data-parent="#accordionsimple1">
                                                                <div class="card-body">
                                                                    <p>There are many people in the world with amazing
                                                                        talents who realize only a small percentage of
                                                                        their potential. We all know people who live
                                                                        this truth.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#CSS33" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Maximum Query Solved</a>
                                                                </h5>
                                                            </div>
                                                            <div id="CSS33" class="collapse" data-parent="#accordionsimple1">
                                                                <div class="card-body">
                                                                    <p>Text of the printin a galley of type and bled it
                                                                        to a type specimen book. It has survived not
                                                                        only five centuries make Lorem Ipsum is simply
                                                                        dummy.Success isn’t really that difficult.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="HTML5" role="tabpanel">
                                                    <div class="accordion" id="accordionsimple2">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#HTML51" class="btn-block text-left text-white acd-heading" data-toggle="collapse">1. Making the decision</a>
                                                                </h5>
                                                            </div>
                                                            <div id="HTML51" class="collapse show" data-parent="#accordionsimple2">
                                                                <div class="card-body">
                                                                    <p>
                                                                        We also know those epic stories, those
                                                                        modern-day legends surrounding the early
                                                                        failures of such supremely successful folks as
                                                                        Michael Jordan and Bill Gates. We can look a
                                                                        bit further back in time to Albert Einstein or
                                                                        even further back to Abraham Lincoln.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#HTML52" class="btn-block text-left text-white acd-heading collapsed" data-toggle="collapse">2. Developing the Vision</a>
                                                                </h5>
                                                            </div>
                                                            <div id="HTML52" class="collapse" data-parent="#accordionsimple2">
                                                                <div class="card-body">
                                                                    <p>
                                                                        Positive pleasure-oriented goals are much more
                                                                        powerful motivators than negative fear-based
                                                                        ones. Although each is successful separately,
                                                                        the right combination of both is the most
                                                                        powerful motivational force known to humankind.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header rounded-0 bg-primary">
                                                                <h5 class="mb-0">
                                                                    <a href="#HTML53" class="btn-block  text-left text-white acd-heading collapsed" data-toggle="collapse">3. Taking Action</a>
                                                                </h5>
                                                            </div>
                                                            <div id="HTML53" class="collapse" data-parent="#accordionsimple2">
                                                                <div class="card-body">
                                                                    <p>The first thing to remember about success is
                                                                        that it is a process – nothing more, nothing
                                                                        less. There is really no magic to it and it’s
                                                                        not reserved only for a select few people. As
                                                                        such, success really has nothing to do with
                                                                        luck, coincidence or fate. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-20" id="jquery" role="tabpanel">
                                                    <div class="accordion" id="accordionfillborde3">
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#jquery1" class="btn-block text-white text-left acd-heading" data-toggle="collapse">1. Many Style Available</a>
                                                                </h5>
                                                            </div>
                                                            <div id="jquery1" class="collapse show" data-parent="#accordionfillborde3">
                                                                <div class="card-body">
                                                                    <p>The sad thing is the majority of people have no
                                                                        clue about what they truly want. They have no
                                                                        clarity. When asked the question, responses
                                                                        will be superficial at best, and at worst, will
                                                                        be what someone else wants for them.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 acd-group">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#jquery2" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">2. Parallax Sections</a>
                                                                </h5>
                                                            </div>
                                                            <div id="jquery2" class="collapse" data-parent="#accordionfillborde3">
                                                                <div class="card-body">
                                                                    <p>The best way is to develop and follow a plan.
                                                                        Start with your goals in mind and then work
                                                                        backwards to develop the plan. What steps are
                                                                        required to get you to the goals? Make the plan
                                                                        as detailed as possible. Try to visualize and
                                                                        then plan for, every possible setback.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acd-group border-bottom-0">
                                                            <div class="card-header bg-primary rounded-0">
                                                                <h5 class="mb-0">
                                                                    <a href="#jquery3" class="btn-block text-white text-left acd-heading collapsed" data-toggle="collapse">3. Unlimited layouts</a>
                                                                </h5>
                                                            </div>
                                                            <div id="jquery3" class="collapse" data-parent="#accordionfillborde3">
                                                                <div class="card-body">
                                                                    <p>Commit the plan to paper and then keep it with
                                                                        you at all times. Review it regularly and
                                                                        ensure that every step takes you closer to your
                                                                        Vision and Goals. If the plan doesn’t support
                                                                        the vision then change it!</p>
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
                        </div>
                        <!--faq-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
@endsection