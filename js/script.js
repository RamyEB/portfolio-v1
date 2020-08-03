$(function() {


    $(".navbar a, footer a").on("click", function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('body,html').animate({ scrollTop: $(hash).offset().top }, 900, function() { window.location.hash; })
    })

    var $lien = $('#portfolio a');
    $('#portfolio .titleProject').hide();
    $lien.hover(
        function() {
            $(this).children('img').css("filter", "brightness(15%)");
            $(this).children('.titleProject').fadeIn(120);
        },
        function() {
            $(this).children('.titleProject').stop(true, true);
            $(this).children('.titleProject').fadeOut({ width: "10px" });
            $(this).children('img').css("filter", "none");

        }
    )


    $('#contact-form').submit(function(e) {
        //enleve le comportement par défaut
        e.preventDefault();
        //On vide les messages d'erreurs
        $('.comments').empty();
        //On met toutes les information du formulaire dans la variable postdata
        var postdata = $("#contact-form").serialize();
        $.ajax({
            type: "POST",
            url: "php/contact.php",
            data: postdata,
            dataType: "json",
            success: function(result) {
                $("#contact-form .thanks-submit").remove();

                if (result.isSuccess) {
                    $("#contact-form").append("<p class='thanks-submit'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                    $("#contact-form")[0].reset();
                } else {
                    $("#firstname + .comments").html(result.firstnameError);
                    $("#name + .comments").html(result.nameError);
                    $("#email + .comments").html(result.emailError);
                    $("#phone + .comments").html(result.phoneError);
                    $("#message + .comments").html(result.messageError);
                }
            }
        });


    })

    const ratio = 0.1
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: ratio
    }

    const handleIntersect = function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.intersectionRatio > ratio) {
                entry.target.classList.add('reveal-visible')
                observer.unobserve(entry.target)
            }
        })
    }

    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll('[class*="reveal-"]').forEach(
        function(r) {
            observer.observe(r);
        })

})