@extends('layouts.master')

@section('content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div>
                    <h1 style="text-align: center;">Contact form</h1>
                    <div class="alert alert-info" style="text-align">
                        This is a boiletplate for your contact form. Feel free to modify it as needed. <br />
                        You can even remove this page. The validation logic is in the ContactController.
                    </div>
                    @if (isset($_SESSION['contact']['errors']))
                    <div class="alert alert-danger">
                        An error has occured with your input. Please check all the fields and submit again.
                    </div>
                    <?php $old = $_SESSION['contact']['old']; ?>
                    @elseif (isset($_SESSION['contact']['success']))
                    <div class="alert alert-success">
                        Thank you. We will come back to you as soon as possible.
                    </div>
                    @endif
                    <?php $_SESSION['contact'] = null; ?>

                    <form action="/contact" method="post" novalidate="">
                        <div class="col-md-offset-3 col-md-6 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="firstname" type="text" value="{{isset($old['firstname']) ? $old['firstname'] : ''}}" placeholder="First Name*" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="lastname" type="text" value="{{isset($old['lastname']) ? $old['lastname'] : ''}}" placeholder="Last Name*" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" value="{{isset($old['email']) ? $old['email'] : ''}}" placeholder="Email Address*" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="phone" type="number" value="{{isset($old['phone']) ? $old['phone'] : ''}}" placeholder="Phone*" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Message*">{{isset($old['message']) ? $old['message'] : ''}}</textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

