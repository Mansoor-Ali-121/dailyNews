@extends('webtemp')
@section('content')


    <section class="contact-container">
        <div class="heading">
            <h1>Contact Us</h1>
            <p>
                Have a question,story tip, or want to share feedback? <br>
                Fill out the form below, and our team will get in
                touch with you as soon as possible.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container">
            <div class="left-side">
                <h3>Get in Touch</h3>
                <ul>
                    <li>Address : Ghouri Town Islamabad</li>
                    <li>Phone : +923065533444</li>
                    <li>Email : contact@daily99news.com</li>
                </ul>
            </div>
            <div class="right-side">
                <form action="{{ route('contact.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="subject" name="subject" id="subject" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </section>

    <style>
        .contact-container {
            padding: 60px 20px;
            /* background: linear-gradient(to right, #1c1c1c, #2a2a2a); */
            color: #ffffff;
            /* background-color: #ff1420;b */
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
        }

        .contact-container .heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-container .heading h1 {
            font-size: 52px;
            color: #000000;
            font-weight: 800;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-container .heading p {
            font-size: 20px;
            color: #000000;
            max-width: 720px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: #1e1e1e;
            padding: 50px 30px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
            gap: 40px;
            transition: all 0.4s ease;
        }

        .left-side,
        .right-side {
            flex: 1 1 100%;
            max-width: 500px;
            background-color: #262626;
            padding: 35px;
            border-radius: 12px;
            box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.25);
            transition: background-color 0.3s ease;
        }

        .left-side:hover,
        .right-side:hover {
            background-color: #2f2f2f;
        }

        .left-side h3 {
            font-size: 24px;
            color: #ff4625;
            margin-bottom: 22px;
            padding-bottom: 12px;
            border-bottom: 2px solid #444;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .left-side ul {
            padding-left: 0;
        }

        .left-side ul li {
            list-style: none;
            margin-bottom: 15px;
            font-size: 17px;
            color: #ddd;
            position: relative;
            padding-left: 25px;
        }

        .left-side ul li::before {
            content: '📍';
            position: absolute;
            left: 0;
            top: 0;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #eee;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            background-color: #151515;
            color: #ffffff;
            border: 1px solid #444;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-control:focus {
            border-color: #ff2e2e;
            background-color: #1c1c1c;
            box-shadow: 0 0 8px rgba(255, 46, 46, 0.4);
        }

        /* button.btn-primary {
            background-color: #e50914;
            color: #fff;
            padding: 12px 26px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease;
        } */

        button.btn-primary:hover {
            background-color: #c40711;
            transform: scale(1.02);
        }

        .alert.alert-danger {
            background-color: #440000;
            border-left: 6px solid #e50914;
            color: #f0a0a0;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                padding: 20px;
            }
        }
    </style>
@endsection
