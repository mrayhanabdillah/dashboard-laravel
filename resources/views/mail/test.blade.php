<!DOCTYPE html>
<html>
<head>
    <title>Voting Confirmation</title>
</head>
<body>
    <h1>Voting Created Successfully!</h1>
    <p>Thank you, {{ $data['name'] }} for participating in the voting.</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Participant ID:</strong> {{ $data['participant_id'] }}</p>
    <p><strong>Vote Type ID:</strong> {{ $data['voteType_id'] }}</p>
    <p><strong>Program ID:</strong> {{ $data['program_id'] }}</p>

    <p>Thank you!</p>
</body>
</html>
