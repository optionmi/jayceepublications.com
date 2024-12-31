<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }

        .header {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .detail-row {
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .label {
            font-weight: bold;
            color: #666;
            width: 120px;
            display: inline-block;
        }

        .attachment {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin: 5px 0;
        }

        .attachment-icon {
            color: #666;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>New Job Application Received</h2>
            <p>A new candidate has applied for {{ $job_position }}</p>
        </div>

        <div class="detail-row">
            <span class="label">Name:</span>
            <span>{{ $name }}</span>
        </div>

        <div class="detail-row">
            <span class="label">Email:</span>
            <span>{{ $email }}</span>
        </div>

        <div class="detail-row">
            <span class="label">Phone:</span>
            <span>{{ $phone }}</span>
        </div>

        <div class="detail-row">
            <span class="label">Position:</span>
            <span>{{ $job_position }}</span>
        </div>

        <div class="detail-row">
            <span class="label">Cover Letter:</span>
            <p>{{ $cover_letter }}</p>
        </div>

        <div class="detail-row">
            <span class="label">Attachments:</span>
            <div class="attachment">
                <span class="attachment-icon">📎</span>
                <a href="{{ $cv_file_url }}" download="{{ $name . '_cv.pdf' }}">{{ $name . '_cv.pdf' }}</a>
            </div>
        </div>
    </div>
</body>

</html>
