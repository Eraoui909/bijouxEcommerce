@extends("backOffice.layout.panel")


@section("title","Inbox")

@section("style")
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset("css/admin/inbox.css")}}">
@endsection


@section("content-wrapper")
    <div class="container">
        <div class="row">
            <!-- BEGIN INBOX -->
            <div class="col-md-12">
                <div class="grid email">
                    <div class="grid-body">
                        <div class="row">
                            <!-- BEGIN INBOX CONTENT -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2 class="grid-title"><i class="fa fa-inbox"></i> Inbox</h2>
                                    </div>

                                    <div class="col-md-6 search-form">
                                        <form action="#" class="text-right">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm search-msg" placeholder="Search">
                                                <span class="input-group-btn">
                                            <button type="submit" name="search" class="btn_ btn-primary btn-sm search"><i class="fa fa-search"></i></button></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="padding"></div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($messages as $message)
                                            <tr {{$message->state == 1 ? 'class=read' : ""}} class="show-msg" data-toggle="modal" data-target="#compose-modal{{$message->id}}" data-id="{{$message->id}}" >
                                                <td class="action"><i class=" {{$message->state == 1 ? 'far fa-envelope-open' : 'fa fa-envelope'}}"></i></td>
                                                <td class="name"><a >{{$message->full_name}}</a></td>
                                                <td class="subject"><a >{{$message->subject}} </a></td>
                                                <td class="time">{{$message->created_at}}</td>
                                                <td class="action delete-msg" data-id="{{$message->id}}"><i class="fas fa-trash-alt"></i></td>
                                            </tr>
                                            <!-- BEGIN COMPOSE MESSAGE -->
                                            <div class="modal fade" id="compose-modal{{$message->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-wrapper">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-blue">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="from title">From </span> : <span class="user content">{{$message->full_name}}</span><br>
                                                                <span class="about title">About </span> : <span class="subject content">{{$message->subject}}</span><br>
                                                                <hr>
                                                                <span class="message title">Message</span> :
                                                                <div class="message-body">{{$message->message}}</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END COMPOSE MESSAGE -->
                                        @endforeach
                                        <form class="csrf-token" action="" method="POST">
                                            @csrf
                                        </form>
                                        </tbody>
                                    </table>
                                </div>

                                <nav aria-label="Page navigation example" style="margin-top: 20px;">
                                    {{ $messages->links() }}
                                </nav>
                            </div>
                            <!-- END INBOX CONTENT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INBOX -->
        </div>
    </div>
@endsection

@section("script")

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(".delete-msg").on("click",function (e) {
            e.preventDefault();
            e.stopPropagation();
            let token = $("form.csrf-token").serialize();
            let data = token + "&id=" + $(this).attr("data-id");
            console.log(data);
            let row = $(this);
            Swal.fire({
                title: 'Es-tu sûr?',
                text: "Vous souhaitez supprimer ce message!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'confirmer !'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax("/admin/message/delete",{
                        type: "post",
                        data: data,
                        success: function (data) {
                            if(data === "ok"){
                                row.parent().hide();
                                Swal.fire(
                                    'Supprimé!',
                                    'Votre catégorie a été supprimée.',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Quelque chose s'est mal passé!",
                                })
                            }
                        },
                    });


                }
            })
        })

        $(".show-msg").on("click",function (e) {
            e.preventDefault();
            let token = $("form.csrf-token").serialize();
            let data = token + "&id=" + $(this).attr("data-id");
            let row = $(this);
            if (!row.hasClass("read")){
                $.ajax("/admin/message/setRead",{
                    type: "post",
                    data: data,
                    success: function (data) {
                        console.log("data");
                        if(data === "ok"){
                            row.addClass("read");
                            row.children(".action").children( ".fa-envelope" ).addClass("fa-envelope-open").addClass("far").removeClass("fa").removeClass("fa-envelope");
                        }
                    },
                });
            }


        })

    </script>
@endsection
