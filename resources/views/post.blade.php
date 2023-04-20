<!doctype html>

<title>My Portfolio Site!</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?= $post->title; ?>
            </a>
        </h1>
        <div>
            <?= $post->body; ?>...
        </div>
    </article>
    <a href="/">Go Back</a>
</body>
