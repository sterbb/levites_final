$(function() {
  // Recommendation data
  var recommendations = [
    {
      id: 1,
      text: "Photo Editing",
      active: true
    },
    {
      id: 2,
      text: "Video Editing",
      active: false
    },
    {
      id: 3,
      text: "Video Conferencing",
      active: false
    },
    {
      id: 4,
      text: "Presentation",
      active: false
    },
    {
      id: 5,
      text: "Live Streaming",
      active: false
    }
  ];

  // Card data
  var cards = [
    // "Photo Editing"
    {
      recommendationId: 1,
      urls: [
        "https://www.adobe.com/ph_en/products/photoshop/landpa.html?gclid=CjwKCAjwjYKjBhB5EiwAiFdSfkdiC2pVatF2Blg4W2bgDrepgNAEULMNFu7P1tULV8TBeA_3-Uf7ghoCGNkQAvD_BwE&sdid=G4FRYR56&mv=search&ef_id=CjwKCAjwjYKjBhB5EiwAiFdSfkdiC2pVatF2Blg4W2bgDrepgNAEULMNFu7P1tULV8TBeA_3-Uf7ghoCGNkQAvD_BwE:G:s&s_kwcid=AL!3085!3!444512451750!e!!g!!adobe%20photoshop!703953000!39399096689"
      ],
      image: "views/WebIcon/photoshop.png",
      text: "Adobe Photoshop"
    },
    {
      recommendationId: 1,
      urls: [
        "https://www.adobe.com/ph_en/products/photoshop-lightroom/campaign/pricing.html?gclid=CjwKCAjwjYKjBhB5EiwAiFdSft5QJGKrC5dJ7bh_rl6z6NxOYiKJVyy2Mp8pry96nKqP0cqE8R7jrRoC0aoQAvD_BwE&sdid=G4FRYR56&mv=search&ef_id=CjwKCAjwjYKjBhB5EiwAiFdSft5QJGKrC5dJ7bh_rl6z6NxOYiKJVyy2Mp8pry96nKqP0cqE8R7jrRoC0aoQAvD_BwE:G:s&s_kwcid=AL!3085!3!645544253991!e!!g!!adobe%20lightroom!703952877!39399101169"
      ],
      image: "views/WebIcon/photoshop-lightroom.png",
      text: "Adobe Lightroom"
    },
    {
      recommendationId: 1,
      urls: [
        "https://www.dxo.com/dxo-photolab/"
      ],
      image: "views/WebIcon/dxo.png",
      text: "DxO PhotoLab"
    },
    {
      recommendationId: 1,
      urls: [
        "https://www.canva.com/"
      ],
      image: "views/WebIcon/Canva.png",
      text: "Canva"
    },
    // "Video Editing"
    {
      recommendationId: 2,
      urls: [
        "https://www.kapwing.com/video-editor"
      ],
      image: "views/WebIcon/kapwing.png",
      text: "Kapwing"
    },
    {
      recommendationId: 2,
      urls: [
        "https://www.flexclip.com/"
      ],
      image: "views/WebIcon/flexclip.png",
      text: "flexclip"
    },
    {
      recommendationId: 2,
      urls: [
        "https://www.veed.io/"
      ],
      image: "views/WebIcon/veedio.png",
      text: "VEED.IO"
    },
    {
      recommendationId: 2,
      urls: [
        "https://filmora.wondershare.com/"
      ],
      image: "views/WebIcon/filmora.png",
      text: "Filmora"
    },
    // "Video Conferencing"
    {
      recommendationId: 3,
      urls: [
        "https://zoom.us/"
      ],
      image: "views/WebIcon/zoom.png",
      text: "Zoom"
    },
    {
      recommendationId: 3,
      urls: [
        "https://www.webex.com/video-conferencing"
      ],
      image: "views/WebIcon/webex.png",
      text: "Webex"
    },
    {
      recommendationId: 3,
      urls: [
        "https://meet.google.com/?pli=1"
      ],
      image: "views/WebIcon/googlemeet.png",
      text: "Google Meet"
    },
    {
      recommendationId: 3,
      urls: [
        "https://www.microsoft.com/en-us/microsoft-teams/log-in"
      ],
      image: "views/WebIcon/msteam.png",
      text: "Ms teams"
    },
    // "Presentation"
    {
      recommendationId: 4,
      urls: [
        "https://prezi.com/"
      ],
      image: "views/WebIcon/prezi.png",
      text: "Prezi"
    },
    {
      recommendationId: 4,
      urls: [
        "https://www.google.com/slides/about/"
      ],
      image: "views/WebIcon/googleslide.png",
      text: "Google Slides"
    },
    {
      recommendationId: 4,
      urls: [
        "https://tome.app/"
      ],
      image: "views/WebIcon/tome.png",
      text: "Tome"
    },
    {
      recommendationId: 4,
      urls: [
        "https://slidesgo.com/"
      ],
      image: "views/WebIcon/slidesgo.png",
      text: "Slidesgo"
    },
    // "Live Streaming"
    {
      recommendationId: 5,
      urls: [
        "https://www.youtube.com/"
      ],
      image: "views/WebIcon/youtube.png",
      text: "Youtube"
    },
    {
      recommendationId: 5,
      urls: [
        "https://obsproject.com/"
      ],
      image: "views/WebIcon/obs.png",
      text: "OBS"
    },
    {
      recommendationId: 5,
      urls: [
        "https://www.uscreen.tv/"
      ],
      image: "views/WebIcon/uscreen.png",
      text: "USCREEN"
    },
    {
      recommendationId: 5,
      urls: [
        "https://streamyard.com/"
      ],
      image: "views/WebIcon/streamyard.png",
      text: "StreamYard"
    }
    // Add more cards here...
  ];

  var recommendationTabs = $("#recommendationTabs");

  for (var i = 0; i < recommendations.length; i++) {
    var recommendation = recommendations[i];
    var button = $("<button>")
      .addClass("nav-link rounded-0 text-center")
      .attr("data-bs-toggle", "pill")
      .attr("type", "button")
      .attr("data-recommendation-id", recommendation.id)
      .text(recommendation.text)
      .on("click", function () {
        var recommendationId = $(this).attr("data-recommendation-id");
        var buttons = $(".recommendation-button");
        buttons.removeClass("active");
        $(this).addClass("active");
        var selectedCards = cards.filter(function (card) {
          return card.recommendationId === parseInt(recommendationId);
        });
        generateCards(selectedCards);
      });

    if (recommendation.id === 1) {
      button.addClass("active");
      generateCards(cards.filter(function (card) {
        return card.recommendationId === 1;
      }));
    }

    recommendationTabs.append(button);
  }

  function generateCards(cards) {
    var cardContainer = $("#cardContainer");
    cardContainer.html("");

    for (var i = 0; i < cards.length; i++) {
      var card = cards[i];
      var cardHTML = `
      <div class="col d-flex text-center justify-content-center align-items-center">
        <a style="padding: 20px" href="${card.urls[0]}" target="_blank">
          <img src="${card.image}" alt="${card.text}" style="width: 50px; height: 50px;">
          <p style="font-size: 1.5em; color:black; padding-top:10px;">${card.text}</p>
        </a>
      </div>
    `;
      var cardElement = $("<div>")
        .addClass("Newcard")
        .html(cardHTML);

      cardContainer.append(cardElement);
      animateCard(cardElement);
    }
  }

  function animateCard(cardElement) {
    cardElement.css("opacity", "0");
    cardElement.css("transform", "translateY(100px)");

    setTimeout(function () {
      cardElement.css("opacity", "1");
      cardElement.css("transform", "translateY(0)");
    }, 100);
  }
});
