@extends('backend.layout.app')
@section('content')
    <style>
        /* *, *::before, *::after { box-sizing: border-box; }
                                      :root { color-scheme: light; }

                                      body {
                                       font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                                       background: #f7f7fb;
                                       color: #111827;
                                       margin: 0;
                                       padding: 24px;
                                      } */
    </style>



    <div class="container announcements-page">
        <h1>Announcements</h1>

        @if (session('success'))
            <div class="msg msg-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="msg msg-error">Please fix the errors and try again.</div>
        @endif

        @php
            $editing = $editing ?? null;
            $announcements = $announcements ?? collect();

            $value = function (string $key, $fallback = '') use ($editing) {
                if (old($key) !== null) {
                    return old($key);
                }
                if ($editing && isset($editing->{$key})) {
                    return $editing->{$key};
                }
                return $fallback;
            };

            $dtLocal = function ($dt): string {
                if (!$dt) {
                    return '';
                }
                try {
                    return \Carbon\Carbon::parse($dt)->format('Y-m-d\\TH:i');
                } catch (\Throwable $e) {
                    return '';
                }
            };
        @endphp

        <div class="grid">
            <div class="section">
                <div class="section-title">{{ $editing ? 'Edit Announcement' : 'Add Announcement' }}</div>

                <form
                    action="{{ $editing ? route('admin.announcements.update', $editing) : route('admin.announcements.store') }}"
                    method="POST">
                    @csrf
                    @if ($editing)
                        @method('PUT')
                    @endif

                    <div class="field">
                        <label for="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ $value('title') }}"
                            placeholder="Title">
                        @error('title')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="nep_title">Nepali Title</label>
                        <input id="nep_title" type="text" name="nep_title" value="{{ $value('nep_title') }}"
                            placeholder="Nepali title (optional)">
                        @error('nep_title')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="type">Type</label>
                        <select id="type" name="type">
                            @php $type = (string) $value('type', 'announcement'); @endphp
                            <option value="news" @selected($type === 'news')>News</option>
                            <option value="announcement" @selected($type === 'announcement')>Announcement</option>
                            <option value="event" @selected($type === 'event')>Event</option>
                            <option value="alert" @selected($type === 'alert')>Alert</option>
                        </select>
                        @error('type')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="priority">Priority</label>
                        <input id="priority" type="number" name="priority" value="{{ $value('priority', 0) }}"
                            placeholder="0">
                        @error('priority')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="status">Status</label>
                        @php
                            $statusVal = $value('status', true);
                            $statusBool = filter_var($statusVal, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                            if ($statusBool === null) {
                                $statusBool = (bool) $statusVal;
                            }
                        @endphp
                        <select id="status" name="status">
                            <option value="1" @selected($statusBool === true)>Active</option>
                            <option value="0" @selected($statusBool === false)>Inactive</option>
                        </select>
                        @error('status')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="start_at">Start At</label>
                        <input id="start_at" type="datetime-local" name="start_at"
                            value="{{ $dtLocal($value('start_at')) }}">
                        @error('start_at')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="end_at">End At</label>
                        <input id="end_at" type="datetime-local" name="end_at"
                            value="{{ $dtLocal($value('end_at')) }}">
                        @error('end_at')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="actions">
                        <button type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
                        @if ($editing)
                            <a class="btn-lite" href="{{ route('admin.announcements.index') }}">Cancel</a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="section">
                <div class="section-title">Existing</div>
                <div class="muted">Cache key used on frontend: <strong>announcement_bar</strong> (auto cleared on
                    create/update/delete)</div>
                <div style="height: 12px;"></div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($announcements as $row)
                                <tr>
                                    <td>
                                        <div style="font-weight: 600;">{{ $row->title }}</div>
                                        @if (!empty($row->nep_title))
                                            <div class="muted">{{ $row->nep_title }}</div>
                                        @endif
                                    </td>
                                    <td><span class="badge">{{ $row->type }}</span></td>
                                    <td>{{ (int) $row->priority }}</td>
                                    <td>
                                        @if ($row->status)
                                            <span class="badge">Active</span>
                                        @else
                                            <span class="badge">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="muted">
                                        {{ $row->start_at ? \Carbon\Carbon::parse($row->start_at)->format('Y-m-d H:i') : '-' }}
                                    </td>
                                    <td class="muted">
                                        {{ $row->end_at ? \Carbon\Carbon::parse($row->end_at)->format('Y-m-d H:i') : '-' }}
                                    </td>
                                    <td>
                                        <div class="actions" style="margin-top: 0;">
                                            <a class="btn-lite"
                                                href="{{ route('admin.announcements.index', ['edit' => $row->id]) }}">Edit</a>
                                            <form action="{{ route('admin.announcements.destroy', $row) }}" method="POST"
                                                onsubmit="return confirm('Delete this announcement?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-lite btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="muted">No announcements yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
