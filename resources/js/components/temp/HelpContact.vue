<template>
    <div>

        <section class="contact-details-area" style="background:#E5E4E2">
            <div class="sec-title text-center" style="line-height:10px">
                <p>Contact Details</p>
                <div class="title text-dark">How Can We <span>Help You?</span></div>
            </div>
            <div class="parallax-background" style="
          background-image: url(frontend/images/parallax-background/contact-details-bg.html);
        "></div>
            <div class="container-fluid" style="background:#E5E4E2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-details-content">
                            <div class="row mb-2" style="background:#E5E4E2">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card border-0" style="width:100%;height:auto">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <video class="video__container" autoplay muted loop>
                                                    <source class="video__media"
                                                        src="frontend/videos/Welcome to Pinecrest Academy.mp4"
                                                        type="video/mp4">
                                                </video>
                                            </div>
                                            <div class="col-md-8" style="background:#343434;color:white">
                                                <div class="card-body">
                                                    <p class="card-text lead" style="color:lightgreen"><small><strong>
                                                                <u
                                                                    style="padding-bottom:1px;border-bottom:2px solid lightgreen;width:30%;text-decoration:none">
                                                                    Book a tour
                                                                </u>
                                                            </strong></small></p>
                                                    <p class="card-text"><small>
                                                            <blockquote class="blockquote">
                                                                <footer class="blockquote-footer text-white"><small>
                                                                        Schedule a tour of our school and meet with the
                                                                        office administration
                                                                        and school staff. Please click the button to
                                                                        book.
                                                                    </small></footer>
                                                            </blockquote>
                                                        </small></p>
                                                    <a href="/activites-and-facilities">
                                                        <p class="card-text float-right mb-2"><button class="button-89"
                                                                role="button">Read More</button> </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card border-0" style="width:100%;height:auto">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="frontend/images/resources/choose-image-one.jpg"
                                                    class="card-img" alt="..." style="width:100%;height:100%">
                                            </div>
                                            <div class="col-md-8" style="background:#343434;color:white">
                                                <div class="card-body">
                                                    <p class="card-text lead" style="color:lightgreen"><small><strong>
                                                                <u
                                                                    style="padding-bottom:1px;border-bottom:2px solid lightgreen;width:30%;text-decoration:none">
                                                                    Submit an enquiry
                                                                </u>
                                                            </strong></small></p>
                                                    <p class="card-text"><small>
                                                            <blockquote class="blockquote">
                                                                <footer class="blockquote-footer text-white"><small>
                                                                        For more information and admission requirements
                                                                        and procedures, click the link below.
                                                                    </small></footer>
                                                            </blockquote>
                                                        </small></p>
                                                    <a href="/enquiry-and-admission">
                                                        <p class="card-text float-right mb-2"><button class="button-89"
                                                                role="button">Read More</button> </p>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</template>

<script>
export default {
    name: 'HelpContact',
    data() {
        return {}
    }

}
</script>

<style scoped>
.video__container {
    /* clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%); */
    height: auto;
    min-height: 100%;
    object-fit: fill;
    width: 100%;
}

.button-89 {
    --b: 1px;
    /* border thickness */
    --s: .20em;
    /* size of the corner */
    --color: royalblue;

    padding: calc(.2em + var(--s)) calc(.4em + var(--s));
    color: var(--color);
    --_p: var(--s);
    background:
        conic-gradient(from 90deg at var(--b) var(--b), #0000 90deg, var(--color) 0) var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
    transition: .3s linear, color 0s, background-color 0s;
    outline: var(--b) solid #0000;
    outline-offset: .6em;
    font-size: 12px;

    border: 0;

    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

.button-89:hover,
.button-89:focus-visible {
    --_p: 0px;
    outline-color: var(--color);
    outline-offset: .05em;
}

.button-89:active {
    background: var(--color);
    color: #fff;
}
</style>
