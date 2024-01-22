# Review Shortcode

**Add simple author and product reviews to your website using easy-to-use shortcodes.**

## Overview

Review Shortcode is a versatile tool that allows you to effortlessly integrate author and product reviews into your website content. With the power of shortcodes, you can showcase reviews with rich visuals, detailed information, and customization options, enhancing the user experience on your site.

## Visuals

### [Author Bio] Specialist Version
#### Screenshots
![Specialist Author Bio Desktop](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/specialist-author-bio.png)
![Specialist Author Bio Mobile](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/specialist-author-bio.png)

#### Shortcode Usage
```shortcode
[rp_author_review avatar="https://pillowspecialist.com/img/profile.webp" author="John Krauss" position="Obsessive Tester. Avid Dreamer"]I'm passionate about quality sleep, and I spent months testing pillows. I am reader-supported through purchases on Amazon. I hope my experience helps others.[/rp_author_review]
```

### Specialist At A Glance
#### Screenshots
![Specialist Author Bio Desktop](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/specialist-glance.png)
![Specialist Author Bio Mobile](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/specialist-glance.png)

#### Shortcode Usage
```shortcode
[rp_glance item_style_border_color="000000" item_style_button_color="000000"]
[rp_pros]Can reduce neck pain, Relatively lower <a href="#">cost</a>[/rp_pros]
[rp_cons]Foam was a bit too soft / low for me and I couldn't exchange it for a firmer or taller version, the cover sleeps pretty hot[/rp_cons]
[/rp_glance]
```

### [Product Review] Specialist Version
#### Screenshots
![Specialist Desktop](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/specialist.png)
![Specialist Mobile 1](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/specialist.png)
![Specialist Mobile 2](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/specialist-2.png)

#### Shortcode Usage
```shortcode
[rp_item_review item_win_tag="Contoured Pillow Alternative" item_image="https://cdn.homehacks.co/wp-content/uploads/2022/01/31115654/epbao-1.jpeg" item_image_link="EPABO, https://www.amazon.com/gp/product/B07BKVG42X/ref=as_li_tl?ie=UTF8&tag=pillow_reviews-20" item_score="6.0" item_score_link="https://www.amazon.com/gp/product/B07BKVG42X/ref=as_li_tl?ie=UTF8&tag=pillow_reviews-20" item_specs_firmness="Soft" item_specs_loft="Low" item_specs_positions="Back" item_specs_body_type="Petite, Average" item_specs_filling_score="3" item_specs_quality_score="4" item_style_border_color="000000" item_style_button_color="000000"]
[rp_excerpt]A decent pillow - however, the issue is that if their one size & firmness level doesn't work for you, you're kind of stuck. The Dosaze Pillow offers free exchanges to different sizes and firmness levels so you can find the best fit for you, so I would test that one instead.[/rp_excerpt]
[rp_pros]Can reduce neck pain, Relatively lower cost[/rp_pros]
[rp_cons]Foam was a bit too soft / low for me and I couldn't exchange it for a firmer or taller version, the cover sleeps pretty hot[/rp_cons]
[/rp_item_review]
```

### Wirecutter Version
#### Screenshots
![Wirecutter Desktop](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/wirecutter.png)
![Wirecutter Mobile 1](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/wirecutter.png)
![Wirecutter Mobile 2](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/wirecutter-2.png)

#### Shortcode Usage
```
[rp__review item_label="Our Pick" item_title="Nest Bedding Easy Breather Pillow" item_image="https://d1b5h9psu9yexj.cloudfront.net/20568/The-Easy-Breather-Pillow_20180416-200643_full.jpg" item_button_1="$179 from Tempur-Pedic, queen size, https://www.nytimes.com/wirecutter/out/link/20568/109771/4/109232?merchant=Nest%20Bedding" item_tags="Best memory-foam pillow"]
[rp_excerpt]Our testers love shredded foam more than any other type, and this pillow is a longtime favorite. It has moldable, customizable filling that gives back- and side-sleepers firm support.[/rp_excerpt]
[/rp__review]

[rp__review item_label="Budget Pick" item_title="Weekender Gel Memory Foam Pillow" item_image="https://d1b5h9psu9yexj.cloudfront.net/32744/Weekender-Gel-Memory-Foam-Pillow-_20190531-133508_full.jpeg" item_button_1="$32 from Amazon, standard size, https://www.nytimes.com/wirecutter/out/link/32744/154072/4/109234?merchant=Amazon" item_button_2="$51 from Walmart, https://www.nytimes.com/wirecutter/out/link/32744/173820/4/109234?merchant=Walmart" item_tags="A high-quality layered-foam pillow"]
[rp_excerpt]The most affordable memory-foam pillow we tried is also our favorite one-piece foam pillow. It offered some of the best neck and shoulder support without overheating our testers.[/rp_excerpt]
[/rp__review]
```

### Everything We Recommend
#### Screenshots
![Desktop Version](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/everything-we-recommend.png)
![Mobile Version](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/everything-we-recommend.png)

#### Shortcode Usage
```
[sbly_slider_review headline="Everything we recommend"]

[sbly_slider_item
item_headline="Our Pick"
item_image="https://cdn.homehacks.co/wp-content/uploads/2022/01/31115654/epbao-1.jpeg"
item_title="Ultimate Ears Wonderboom 3"
item_link="https://google.com/"
item_label="The best portable Bluetooth speaker"
item_description="This small, round speaker has a natural sound and a cool design, and it's built to survive outdoor adventures. But it's a little chunky, and it uses an outdated Micro-USB port for charging."
item_buying_options_1="$80 from Amazon, https://link.com"
item_buying_options_2="$60 from Ebay, https://ebay.com"
]

[sbly_slider_item
item_headline="Runner Up"
item_image="https://cdn.homehacks.co/wp-content/uploads/2022/01/31115654/epbao-1.jpeg"
item_title="Soundcore Motion 300"
item_link="https://google.com/"
item_label="If USB-C charging is a must-have"
item_description="This speaker is larger than our top pick, but its slender form may fit more easily into tight spaces. The sound quality is comparable, and it offers convenient USB-C charging."
item_buying_options_1="$80 from Amazon, https://link.com"
item_buying_options_2="$60 from Ebay, https://ebay.com"
]

[/sbly_slider_review]
```

### Pick and Tested
#### Screenshots
![Desktop Version](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/desktop/pick-and-tested.png)
![Mobile Version](https://raw.githubusercontent.com/klinelozada/sbly-review-shortcode/main/core/screenshots/mobile/pick-and-tested.png)

#### Shortcode Usage
```
[sbly_checklist headline="How we picked and tested" link="Read More, https://google.com"]
[sbly_checklist_item title="Panel Testing" description="We tested Bluetooth speakers with expert listeners, and we concealed the identities of the speakers to eliminate bias"]
[sbly_checklist_item title="Real-world Trials" description="We continue to spend many hours with our recommended speakers to make sure they survive day-to-day use."]
[sbly_checklist_item title="Wide range of models" description="The speakers we tested ranged from tiny travel models to 40-pound backyard blasters. All of them included rechargeable batteries."]
[sbly_checklist_item title="Price Range" description="To give readers a full picture of the category, we tested models priced as low as $10 and as high as $500."]
[/sbly_checklist]
```

## Contribution
We welcome contributions from the open-source community. If you have ideas for improvements, bug fixes, or new features, please open an issue or submit a pull request. Together, we can make this tool even more versatile and powerful.
