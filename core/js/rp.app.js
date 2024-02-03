$(document).ready(function() {

    // Count the number of .review-product-container elements
    var containerCount = $(".review-product-container").length;

    // Iterate over each .review-product-container element
    $(".review-product-container").each(function(index) {

        // Add id on loop
        $(this).find('.rp-score').attr('id', 'rpq' + (index + 1));
        
        // Update the .total-no span with the total count
        $(this).find(".total-no").text(containerCount);

        // Update the .win-no span with the current index + 1
        $(this).find(".win-no").text(index + 1);

        // Add circleProgress for rating
        var item_rating = $(this).data('rating') * 0.1;
        if(!item_rating){
            item_rating = 0.25;
        }

        var progressBarOptions = {
            startAngle: -1.55,
            size: 90,
            value: item_rating * 1,
            fill: {
                color: "#019309"
            }
        }

        $(this).find('.rp-score').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
            $(this).find('.rp-score .score').text(String(stepValue.toFixed(2)));
        });

    });

    $(".rp-star-rating").each(function() {
        var $this = $(this);
        var ratingScore = $this.data("rating-score");
        
        $this.starRating({
            totalStars: ratingScore,
            starSize: 15,
            emptyColor: "lightgray",
            hoverColor: "#FFA41C",
            activeColor: "#FFA41C",
            initialRating: 25,
            strokeWidth: 0,
            useGradient: false,
            minRating: 1,
            readOnly: true
        });
    });

    $('.sbly--ads-btn').hover(function() {
        $('.sbly--hidden-bubble').fadeIn(300);
    }, function() {
        $('.sbly--hidden-bubble').fadeOut(300);
    });

    function getLabelForItem(index) {
        if (index === 0) { // For the first item
            var currentYear = new Date().getFullYear();
            return `"#1 PICK IN ${currentYear}"`;
        } else {
            return getOrdinalIndicator(index + 1);
        }
    }

    function getOrdinalIndicator(i) {
        var j = i % 10,
            k = i % 100;
        if (j == 1 && k != 11) {
            return `"${i}st"`;
        }
        if (j == 2 && k != 12) {
            return `"${i}nd"`;
        }
        if (j == 3 && k != 13) {
            return `"${i}rd"`;
        }
        return `"${i}th"`;
    }

    var styleHTML = "<style>";
    $('.sbly--review-top-3-item').each(function(index) {
        var label = getLabelForItem(index);
        styleHTML += `.sbly--review-top-3-item:nth-child(${index + 1})::before { content: ${label}; }`;
    });
    styleHTML += "</style>";

    // Append the styles to the head
    $('head').append(styleHTML);

});