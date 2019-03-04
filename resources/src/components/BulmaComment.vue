<template>
    <section id="admin-comment">
    <div class="container">
    <div class="columns">
    <div class="column">
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p><strong>Geoffrey Rolfson</strong> <small>@email.com</small> <small>32m</small></p>
                    <p>
                        Perferendis laborum ab magni expedita ea modi quia accusantium sit. Iste a est. Sunt et minima beatae temporibus incidunt commodi dolores possimus. Vero blanditiis quis omnis optio perspiciatis. Assumenda vel aperiam tempore.
                    </p>
                    <p><small><a>Like</a> · <a>Reply</a> · 3 hrs</small></p>
                </div>
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p><strong>Ford Jast</strong> <small>@example.com</small> <small>29m</small></p>
                            <p>Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.</p>
                            <p><small><a>Like</a> · <a>Reply</a> · 2 hrs</small></p>
                        </div>
                        <article class="media">
                            Nesciunt minima repellendus quia quia ducimus. Autem eum et molestiae praesentium ut laborum molestiae aut. Ut officia beatae quae porro. Et ea dolorum alias minus quos nam a labore. Ducimus nostrum quo qui voluptatum accusantium vel.
                        </article>
                        <article class="media">
                            Necessitatibus magnam et adipisci officiis quo enim aut harum. Laborum hic doloribus nihil. Quos delectus maiores eius. Veritatis incidunt omnis placeat distinctio quis molestiae repellat architecto rem. Autem dolorem exercitationem nostrum culpa quo sit sed.
                        </article>
                    </div>
                </article>
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Kayli Eunice </strong>
                                <br>
                                Sed convallis scelerisque mauris, non pulvinar nunc mattis vel. Maecenas varius felis sit amet magna vestibulum euismod malesuada cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id feugiat.
                                <br>
                                <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="media-right">
                <button class="delete"></button>
            </div>
        </article>
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                    <p class="control">
                        <textarea cols="30" rows="10" class="textarea" placeholder="Add a comment ..."></textarea>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button">Post Comment</button>
                    </p>
                </div>
            </div>
        </article>
    </div>
    </div>
    </div>
    </section>
</template>

<script>
export default {
    name: 'BulmaComment'
}
</script>
