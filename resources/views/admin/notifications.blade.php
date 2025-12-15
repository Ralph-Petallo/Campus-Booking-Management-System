<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="notifications-page">

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Main Container -->
    <div class="container">

        <!-- Header / Top Green Bar -->
        @include('admin.nav-bar')

        <!-- Logo Overlay -->
        <div class="logo-overlay">
            <img src="{{ asset('assets/logo.png') }}" alt="SNSU Logo" />
        </div>

        <!-- Notifications -->
        <div class="notifications-container">

            @if($notifications->count())

                @php
                    $groupedNotifications = $notifications->groupBy(function ($notif) {
                        return $notif->created_at->isToday()
                            ? 'Today'
                            : $notif->created_at->diffForHumans(['parts' => 1, 'short' => true]);
                    });
                @endphp

                @foreach($groupedNotifications as $dateLabel => $group)
                    <div class="notification-section">
                        <h2>{{ $dateLabel }}</h2>

                        @foreach($group as $notif)
                            <div class="notification-box {{ $notif->is_read ? 'read' : 'unread' }}">
                                <p>
                                    <strong>{{ optional($notif->student)->name ?? 'Unknown' }}</strong>

                                    @switch($notif->action)
                                        @case('reserved')
                                            reserved
                                            @break
                                        @case('cancelled')
                                            cancelled
                                            @break
                                        @case('confirmed')
                                            confirmed
                                            @break
                                        @default
                                            performed an action
                                    @endswitch

                                    @if($notif->booking)
                                        the <strong>{{ $notif->booking->facility->type }}</strong>
                                        for <strong>{{ \Carbon\Carbon::parse($notif->booking->date)->format('F d, Y') }}</strong>.
                                    @else
                                        .
                                    @endif
                                </p>

                                @if($notif->booking)
                                    <a href="{{ route('admin.booking-confirmation', $notif->booking->id) }}"
                                       class="more">
                                        Click to see more
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach

            @else
                <!-- EMPTY STATE -->
                <div class="notification-box empty">
                    <p>No notifications yet.</p>
                </div>
            @endif

        </div>
        <!-- End Notifications -->

    </div>
    <!-- End Container -->

</body>

</html>
