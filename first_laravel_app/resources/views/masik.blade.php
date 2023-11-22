<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MÁSIK</title>
</head>
<body>
<h1>MÁSIK</h1>
    @php
        $num = 3;
        $posts = [
            (object)[
                'title'   => 'Egy almafa',
                'author'  => 'John Doe',
                'content' => 'Aliquam erat volutpat. Maecenas erat turpis, malesuada sed lorem quis, tincidunt bibendum orci. Cras non ipsum a nibh posuere tristique.'
            ],
            (object)[
                'title'   => 'Két katica',
                'author'  => 'Yamada Hanako',
                'content' => 'Etiam cursus lectus vel accumsan aliquam. Maecenas dapibus blandit felis vel ultricies. Proin vitae ante id sem interdum sagittis.'
            ],
            (object)[
                'title'   => 'Három kiscica',
                'author'  => 'Petar Petrović',
                'content' => 'Mauris finibus id sem a pulvinar. In metus ante, consequat vel neque eget, ultrices eleifend lacus. Duis blandit elementum imperdiet.'
            ],
            (object)[
                'title'   => 'Négy porszívó',
                'author'  => 'Kim Yuna',
                'content' => 'Nunc vehicula congue ipsum sed tincidunt. Aenean ut nibh leo. Aenean ut justo quis risus maximus consequat sed ac lorem.'
            ],
        ];
    @endphp

    @if ($num == 3)
        <h2>Három</h2>
    @endif

    <?php if ($num == 3): ?>
        <h2>Három</h2>
    <?php endif ?>

</body>
</html>