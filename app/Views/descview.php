<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<div class="desc-container">
  <div class="horizontal-div">
    <div class="desc-child left-child">
      <nav class="breadcrumb">
      <a href="<?= base_url('/') ?>">Home</a>&gt;
        <?php if (!empty($house)): ?>
            <a href="<?= base_url('houses') ?>">Houses in Kenya</a>&gt; Available &gt;
        <?= $house['name'] ?>
        <?php elseif (!empty($design)): ?>
            <a href="<?= base_url('designs') ?>">Designs</a>&gt; Available &gt;
        <?= $design['name'] ?>
        <?php endif; ?>
      </nav>
      <div class="desc-image-container">
        <i class="material-icons scroll-left">chevron_left</i>
        <?php if (!empty($house)): ?>
        <img
          src="<?= base_url('/public/') . $house['image1_url'] ?>"
          alt="<?= $house['name'] ?>"
          class="big-image"
        />
        <?php elseif (!empty($design)): ?>
        <img
          src="<?= base_url('/public/images/') . $design['image1_url'] ?>"
          alt="<?= $design['name'] ?>"
          class="big-image"
        />
        <?php endif; ?>
        <i class="material-icons scroll-right">chevron_right</i>
        <div class="small-images">
          <?php if (!empty($house)): ?>
          <?php for ($i = 1; $i <= 8; $i++): ?>
          <?php if (!empty($house["image{$i}_url"])): ?>
          <img src="<?= base_url('/public/') . $house["image{$i}_url"] ?>"
          alt="Image
          <?= $i ?>">
          <?php endif; ?>
          <?php endfor; ?>
          <?php elseif (!empty($design)): ?>
          <?php for ($i = 1; $i <= 8; $i++): ?>
          <?php if (!empty($design["image{$i}_url"])): ?>
          <img src="<?= base_url('/public/images/') . $design["image{$i}_url"] ?>"
          alt="Image
          <?= $i ?>">
          <?php endif; ?>
          <?php endfor; ?>
          <?php endif; ?>
        </div>
      </div>
      <?php if (!empty($house)): ?>
      <div class="price-rating">
        <span class="price"
          >KES
          <?= number_format($house['price']) ?></span
        ><span class="rating"
          >Rating<i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i
          ><i class="material-icons">star</i></span
        >
      </div>
      <?php elseif (!empty($design)): ?>
      <div class="price-rating">
        <span class="price"
          >KES
          <?= number_format($design['price']) ?></span
        ><span class="rating"
          >Rating<i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i
          ><i class="material-icons">star</i></span
        >
      </div>
      <?php endif; ?>
    </div>
    <?php if (!empty($house)): ?>
    <div class="desc-child right-child">
      <h2><?= $house['name'] ?></h2>
      <p><?= $house['description'] ?></p>
      <div class="action-buttons">
        <button class="whatsapp-button">
          <a
            href="https://wa.me/254707276100"
            class="whatsapp-button"
            target="_blank"
            ><img
              src="<?= base_url('/public/images/icons/wats_ic.png') ?>"
              alt="Inquire"
            />
            Inquire via WhatsApp</a
          ></button
        ><button class="call-button">
          <a href="tel:+254707276100" class="call-button"
            ><img
              src="<?= base_url('/public/images/icons/call_ic.png') ?>"
              alt="Call"
            />
            Call Now</a
          >
        </button>
      </div>
      <div class="share">
        <h3>Share</h3>
        <div class="share-icons">
          <div class="share-icon" id="instagram">
            <img
              src="<?= base_url('/public/images/icons/ig_ic.png') ?>"
              alt="Instagram"
            />
          </div>
          <div class="share-icon" id="facebook">
            <img
              src="<?= base_url('/public/images/icons/fb_ic.png') ?>"
              alt="Facebook"
            />
          </div>
          <div class="share-icon" id="other">
            <img
              src="<?= base_url('/public/images/icons/x_ic.png') ?>"
              alt="Other"
            />
          </div>
        </div>
      </div>
    </div>
    <?php elseif (!empty($design)): ?>
    <div class="desc-child right-child">
      <h2><?= $design['name'] ?></h2>
      <p><?= $design['description'] ?></p>
      <div class="action-buttons">
        <button class="whatsapp-button">
          <a
            href="https://wa.me/254707276100"
            class="whatsapp-button"
            target="_blank"
            ><img
              src="<?= base_url('/public/images/icons/wats_ic.png') ?>"
              alt="Inquire"
            />
            Inquire via WhatsApp</a
          ></button
        ><button class="call-button">
          <a href="tel:+254707276100" class="call-button"
            ><img
              src="<?= base_url('/public/images/icons/call_ic.png') ?>"
              alt="Call"
            />
            Call Now</a
          >
        </button>
      </div>
      <div class="share">
        <h3>Share</h3>
        <div class="share-icons">
          <div class="share-icon" id="instagram">
            <img
              src="<?= base_url('/public/images/icons/ig_ic.png') ?>"
              alt="Instagram"
            />
          </div>
          <div class="share-icon" id="facebook">
            <img
              src="<?= base_url('/public/images/icons/fb_ic.png') ?>"
              alt="Facebook"
            />
          </div>
          <div class="share-icon" id="other">
            <img
              src="<?= base_url('/public/images/icons/x_ic.png') ?>"
              alt="Other"
            />
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <?php if (!empty($house)): ?>
  <div class="horizontal-div">
    <div class="desc-child2 left-child">
      <p><?= $house['description'] ?></p>
      <h4>Key Features</h4>
      <table class="features-table">
        <tr>
          <td>Rooms</td>
          <td>
            <?= $house['bedrooms'] ?>
            Bedrooms,
            <?= $house['bathrooms'] ?>
            Bathrooms
          </td>
        </tr>
        <tr>
          <td>Year Built</td>
          <td><?= $house['year_built'] ?></td>
        </tr>
        <tr>
          <td>Lot Size</td>
          <td>
            <?= $house['lot_size'] ?>
            Sqft
          </td>
        </tr>
        <tr>
          <td>Garage Spaces</td>
          <td><?= $house['garage_spaces'] ?></td>
        </tr>
        <tr>
          <td>Amenities</td>
          <td><?= $house['amenities'] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?= $house['address'] ?></td>
        </tr>
        <tr>
          <td>City</td>
          <td><?= $house['city'] ?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?= $house['state'] ?></td>
        </tr>
        <tr>
          <td>Zip Code</td>
          <td><?= $house['zip_code'] ?></td>
        </tr>
        <tr>
          <td>Latitude</td>
          <td><?= $house['latitude'] ?></td>
        </tr>
        <tr>
          <td>Longitude</td>
          <td><?= $house['longitude'] ?></td>
        </tr>
      </table>
    </div>
    <div class="desc-child2 right-child">
      <h3>Customer Reviews</h3>
      <div class="review">
        <h4>John Doe</h4>
        <div class="rating">
          <i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i>
        </div>
        <p>
          This charming house offers spacious rooms, a well-appointed kitchen,
          and a serene backyard. Conveniently located in a family-friendly
          neighborhood, it's an ideal home for creating lasting memories.
        </p>
      </div>
      <div class="review">
        <h4>Jane Smith</h4>
        <div class="rating">
          <i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i>
        </div>
        <p>
          Excellent location and modern amenities. This house truly offers a
          comfortable and stylish living experience. Highly recommended!
        </p>
      </div>
      <div class="review">
        <h4>Michael Brown</h4>
        <div class="rating">
          <i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i>
        </div>
        <p>
          A fantastic house in a great location. The design and facilities are
          top-notch, making it a perfect home for families.
        </p>
      </div>
      <div class="review">
        <h4>Sarah Wilson</h4>
        <div class="rating">
          <i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i><i class="material-icons">star</i
          ><i class="material-icons">star</i>
        </div>
        <p>
          I love the spacious layout and modern design. It's a beautiful house
          in a convenient location. Highly recommended!
        </p>
      </div>
    </div>
  </div>
</div>
<?php elseif (!empty($design)): ?>
<div class="horizontal-div">
  <div class="desc-child2 left-child">
    <p><?= $design['description'] ?></p>
    <h4>Key Features</h4>
    <table class="features-table"></table>
  </div>
  <div class="desc-child2 right-child">
    <h3>Customer Reviews</h3>
    <div class="review">
      <h4>John Doe</h4>
      <div class="rating">
        <i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i>
      </div>
      <p>
        This charming house offers spacious rooms, a well-appointed kitchen, and
        a serene backyard. Conveniently located in a family-friendly
        neighborhood, it's an ideal home for creating lasting memories.
      </p>
    </div>
    <div class="review">
      <h4>Jane Smith</h4>
      <div class="rating">
        <i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i>
      </div>
      <p>
        Excellent location and modern amenities. This house truly offers a
        comfortable and stylish living experience. Highly recommended!
      </p>
    </div>
    <div class="review">
      <h4>Michael Brown</h4>
      <div class="rating">
        <i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i>
      </div>
      <p>
        A fantastic house in a great location. The design and facilities are
        top-notch, making it a perfect home for families.
      </p>
    </div>
    <div class="review">
      <h4>Sarah Wilson</h4>
      <div class="rating">
        <i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i><i class="material-icons">star</i
        ><i class="material-icons">star</i>
      </div>
      <p>
        I love the spacious layout and modern design. It's a beautiful house in
        a convenient location. Highly recommended!
      </p>
    </div>
  </div>
</div>
<?php endif; ?>
<?php if (!empty($house)): ?>
<h3>Similar Houses</h3>
<div class="horizontal-div"></div>
<?php elseif (!empty($design)): ?>
<h3>Similar Designs</h3>
<div class="horizontal-div"></div>
<?php endif; ?>
<?= $this->endSection() ?>
