@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">
        @include('inc.navbar')
        @include('inc.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-sm">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center font-weight-bold">All Tickets</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container justify-content-sm-center">
                    @if (isset($ticket_title) && $ticket_title != null)
                        @foreach ($ticket_title as $title)
                            @if (isset($ticket_token_id) && $title->token_id == $ticket_token_id)
                            @break
                        @endif
                        <div class="row">
                            <div class="col lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="font-weight: bold">
                                            {{ @$title->title }}
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" id="msgBody"
                                        style="height: 400px; overflow-y: scroll; overflow-x: hidden">
                                        <div class="row">
                                            <div class="col lg-12">
                                                <div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    @foreach ($ticket_message as $message)
                                                                        @if (isset($message) &&
                                                                            $message->message != null &&
                                                                            $title->token_id == $token_id &&
                                                                            $message->title == $title->title)
                                                                            @if (auth()->user()->id == $message->user_id)
                                                                                <div style="text-align: right;">
                                                                                    <p
                                                                                        style="background-color:lightblue; word-wrap:break-word; display:inline-block;
                                                                                            padding:5px; border-radius:10px; max-width:70%; margin: 5px">
                                                                                        {{ $message->message }}
                                                                                    </p>

                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $message_token_id = $message->token_id;
                                                                                
                                                                            @endphp
                                                                            @if (isset($message_token_id))
                                                                                @if ($message->user_id == 1 && $message->token_id == $message_token_id)
                                                                                    <div style="text-align: left;">
                                                                                        <p
                                                                                            style="background-color:yellow; word-wrap:break-word; display:inline-block;
                                                                                    padding:5px; border-radius:10px; max-width:70%">

                                                                                            {{ $message->message }}
                                                                                        </p>

                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($title->ticket_status == 'Opened')
                                        <div class="row">
                                            <div class="col lg-12">
                                                <div class="card" style="margin-bottom: 1px">
                                                    <div class="card-body ">
                                                        <form
                                                            action="{{ route('storeTicketReply', $title->token_id) }}"
                                                            method="post">
                                                            @csrf
                                                            @if ($errors->any())
                                                                {{ implode('', $errors->all('<div>:message</div>')) }}
                                                            @endif
                                                            <div class="row">
                                                                <input type="text" name="title"
                                                                    value="{{ $title->title }}" hidden>
                                                                <input type="text" name="priority"
                                                                    value="{{ $priority }}" hidden>
                                                                <div class="col-lg-11">
                                                                    <textarea type="text" id="message" name="message" class="form-control" rows="1" required
                                                                        style=" resize: none ;background-color:#ffffff; border-radius: 12px 15px 15px 12px; font-size:13px; border: 1px solid black"></textarea>

                                                                    @error('message')
                                                                        <span class="invalid-feedback"
                                                                            role="alert">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-lg-1">
                                                                    <button type="submit"
                                                                        class="btn btn-primary px-2">Reply</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h5 class="text-center">Your ticket has been Closed.</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @php
                            $ticket_token_id = $title->token_id;
                        @endphp
                    @break
                @endforeach
                @if (!isset($title) || $title == null)
                    <h5 class="text-center">There is no ticket created.</h5>
                @endif
            @else
                <h5 class="text-center">There is no ticket created.</h5>
            @endif
        </div>
    </div>
</div>
</div>
@include('inc.footer')
