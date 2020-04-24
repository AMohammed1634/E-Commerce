@extends("user.app")

@section("content")
    <style>
        .home{
            display: none;
        }
        nav._header{
            background-color: #116979;
            color: #ffffff;
            padding: 15px 30px;
            margin-bottom: 30px;
        }
    </style>
@endsection
@section("boxes")

    <nav class="_header">
        <h2>Edit Profile <span>{{auth()->user()->name}}</span></h2>
    </nav>
    <div class="container" style="color: #000000">
        <section id="profile">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form id="_saveChanges" method="post" action="{{route("updateProfile")}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}">
                                    </div>

                                </form>
                            </div>

                        </div>
                        <section id="actions" class="py-4 mb-4 bg-light">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-4">
                                        <button id="_saveChangesBtn" class="btn btn-success btn-block">
                                            Save Changes
                                        </button>
                                    </div>
                                    @if(auth()->user()->isAdmin != 1)
                                        <div class="col-md-4">
                                            <a href="#" class="btn btn-danger btn-block">
                                                 Delete Account
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <h3>{{auth()->user()->name}}</h3>
                        <img src="/storage/profile_images/{{auth()->user()->img}}"
                             alt="" class="d-block img-fluid mb-3">
                        <button id="_editImage" class="btn btn-primary btn-block">Edit Image</button>
                        <form action="{{route("changeImage")}}" method="post" enctype="multipart/form-data" id="_formImage">
                            @csrf
                            <input type="file" name="img" hidden id="input_image">
                        </form>

                        <br>
                        <a href="{{route("deleteImage")}}" class="btn btn-danger btn-block">Delete Image</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/editProfile.js"></script>
@endsection


