<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RAPP LEAD-UP Programme</title>
</head>
<body>

    <h2>Congratulations!</h2>

    <p>
        Dear {{ $application->APL_Parent_Name }},
    </p>

    <p>
        We are pleased to inform you that
        <strong>
            {{ $application->APL_FName }}
            {{ $application->APL_LName }}
        </strong>
        has been selected to participate in the
        <strong>
            RAPP LEAD-UP (Leadership, Empowerment, Advancement,
            Development, Upliftment and Progress) Vacation Programme.
        </strong>
    </p>

    <p>
        We are excited to welcome your child and look forward to meeting them on
        <strong>Monday 13th July 2026</strong>
        at their assigned RAPP LEAD-UP Centre.
    </p>

    <p>
        <strong>Assigned Centre:</strong>
        {{ $application->APL_Programme_Center }}
    </p>

    <p>
        Get ready for four weeks of fun, learning, new friendships,
        exciting activities, and unforgettable experiences!
    </p>

    <p>
        See you on Monday! We can't wait to begin this journey together.
    </p>

    <p>
        Kind Regards,<br>
        <strong>Ministry of Sport and Youth Affairs</strong>
    </p>

</body>
</html>
