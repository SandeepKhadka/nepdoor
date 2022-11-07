@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('createTicket') }}">Support Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="creatTicket">Create Ticket</li>
            </ol>
        </nav>
        @include('inc.sidebar')

        <div class="content-wrapper">
            <div class="content" style="padding-top:50px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Create Ticket Message</h4>
                            <div class="card">
                                <div class="card-body">
                                    @if (isset($subscription) && !empty($subscription))
                                        @if (isset($ticket_status) && $ticket_status != null)
                                            @foreach ($ticket_status as $ticket)
                                                @if ($ticket->ticket_status == 'Opened')
                                                    @php
                                                        $is_open = true;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (isset($is_open) && $is_open == true)
                                            <h5 class="text-center">There is already a ticket opened</h5>
                                        @else
                                            <form action="{{ route('storeTicket') }}" method="post" class="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            required>
                                                        @error('title')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="priority">Priority</label>
                                                        <select type="text" class="form-control form-control-sm"
                                                            id="priority" name="priority" required>
                                                            <option
                                                                {{ @$ticket_data->priority == 'Normal' ? 'selected' : '' }}>
                                                                Normal
                                                            </option>
                                                            <option
                                                                {{ @$ticket_data->priority == 'Urgent' ? 'selected' : '' }}>
                                                                Urgent
                                                            </option>
                                                        </select>
                                                        @error('priority')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="message">Send Message</label>
                                                        <textarea id="message" name="message" class="form-control form-control-sm" rows="5" required
                                                            style="resize: none;"></textarea>
                                                        @error('message')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                                <button type="submit" class="btn btn-success float-right">Send</button>
                                                </a>
                                            </form>
                                        @endif
                                    @else
                                        <h5 class="text-center">First take subscription.</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</body>
