<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تیم‌های من | Dota 2 Rush</title>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Tajawal', sans-serif;
      color: white;
      background: url('images/photo19827599497.webp') center center / cover no-repeat;
      min-height: 100vh;
    }
    header {
      text-align: center;
      width: 100%;
      height: calc(100vw / 5.2);
      position: relative;
    }
    
    header h1 {
      margin-top: 10rem;
      font-family: 'Trajan Pro', serif;
      font-size: 2.5rem;
      margin: 0;
      text-shadow: 0 0 15px rgba(255, 215, 0, 0.7);
      letter-spacing: 1px;
    }
    header p {
      margin-top: 3rem;
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0.5rem auto 0;
    }
    .container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 1rem;
    }
    .card {
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid #444;
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 0 15px rgba(255,255,255,0.1);
      backdrop-filter: blur(5px);
    }
    .card h2 {
      color: #FFD700;
      margin-bottom: 1rem;
      font-size: 1.5rem;
      text-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .form-group {
      margin-bottom: 1.2rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: #aaa;
    }
    input, textarea, select {
      width: 100%;
      padding: 0.8rem;
      border-radius: 8px;
      border: none;
      font-family: inherit;
      background: #222;
      color: white;
      transition: all 0.3s ease;
      border: 1px solid transparent;
    }
    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #9D50BB;
      box-shadow: 0 0 10px rgba(157, 80, 187, 0.5);
    }
    button {
      background: linear-gradient(to right, #FF6B6B, #9D50BB);
      color: white;
      border: none;
      padding: 0.8rem 1.8rem;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      font-weight: bold;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    button:hover {
      background: linear-gradient(to right, #FF416C, #9D50BB);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(157, 80, 187, 0.4);
    }
    button:after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        to bottom right,
        rgba(255,255,255,0) 0%,
        rgba(255,255,255,0) 45%,
        rgba(255,255,255,0.3) 50%,
        rgba(255,255,255,0) 55%,
        rgba(255,255,255,0) 100%
      );
      transform: rotate(30deg);
    }
    button:hover:after {
      animation: shine 1.5s infinite;
    }
    @keyframes shine {
      0% { left: -50%; top: -50%; }
      100% { left: 150%; top: 150%; }
    }
    .team-list, .member-list {
      margin-top: 1.5rem;
    }
    .team-card {
      background: #141414;
      border: 1px solid #666;
      border-radius: 10px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .team-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(157, 80, 187, 0.3);
    }
    .team-card h3 {
      margin-top: 0;
      color: #00FFFF;
      font-size: 1.3rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .team-card p {
      margin: 0.5rem 0 1rem;
      color: #ccc;
      line-height: 1.5;
    }
    
    /* تب‌ها */
    .team-tabs {
      display: flex;
      margin-bottom: 1.5rem;
      border-bottom: 1px solid #444;
    }
    .tab-btn {
      background: none;
      border: none;
      color: #aaa;
      padding: 0.7rem 1.2rem;
      cursor: pointer;
      position: relative;
      font-size: 0.9rem;
      transition: all 0.3s ease;
    }
    .tab-btn:hover {
      color: #FFD700;
    }
    .tab-btn.active {
      color: #FFD700;
      font-weight: bold;
    }
    .tab-btn.active:after {
      content: '';
      position: absolute;
      bottom: -1px;
      left: 0;
      right: 0;
      height: 3px;
      background: #FFD700;
      border-radius: 3px 3px 0 0;
    }
    
    /* محتوای تب‌ها */
    .tab-content {
      display: none;
      animation: fadeIn 0.5s ease;
    }
    .tab-content.active {
      display: block;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    /* انتخابگر تیم */
    .team-switcher {
      margin-bottom: 1.5rem;
    }
    .team-switcher select {
      background: #333;
      color: white;
      border: 1px solid #555;
      padding: 0.7rem;
      border-radius: 8px;
      width: 100%;
      max-width: 300px;
      font-family: inherit;
    }
    
    /* واکنشگرا */
    @media (max-width: 768px) {
      header h1 {
        margin-top: 10rem;
        font-size: 1.8rem;
      }
      header p {
        margin-top: 3rem;
        font-size: 1rem;
      }
      .team-actions {
        flex-direction: column;
      }
      .team-actions button {
        width: 100%;
      }
      .team-tabs {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 5px;
      }
    }
  
    body::before {
      content: '';
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.7));
      z-index: -1;
    }
    .card {
      background: rgba(10, 10, 10, 0.4);
      box-shadow: 0 0 30px rgba(0,0,0,0.3);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      animation: fadeIn 1s ease forwards;
      opacity: 0;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .main-header {
      width: 100%;
      height: calc(100vw / 5.2);
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      z-index: 1;
    }

    .header-overlay {
      text-align: center;
      background: rgba(0, 0, 0, 0.4);
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }

    .header-buttons {
      margin-top: 1.5rem;
      display: flex;
      justify-content: center;
      gap: 1rem;
    }

    .nav-btn {
      background: rgba(0,0,0,0.6);
      color: #FFD700;
      padding: 0.7rem 1.4rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      border: 1px solid #FFD700;
      transition: all 0.3s ease;
    }

    .nav-btn:hover {
      background: rgba(255, 215, 0, 0.2);
      color: white;
      border-color: white;
    }

    .fog-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(ellipse at center, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.4) 100%);
      pointer-events: none;
      z-index: 0;
      opacity: 0.5;
      animation: fogMove 30s ease-in-out infinite alternate;
      mix-blend-mode: overlay;
    }

    @keyframes fogMove {
      0% { transform: translateX(0) translateY(0) scale(1); }
      100% { transform: translateX(-5%) translateY(2%) scale(1.05); }
    }

    /* استایل‌های جدید برای آواتار و مینی پروفایل */
    .profile-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, #9D50BB, #6E48AA);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.2rem;
      flex-shrink: 0;
      overflow: hidden;
    }

    .profile-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .mini-profile {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0.5rem;
      background: rgba(0,0,0,0.2);
      border-radius: 8px;
      width: 100%;
    }

    .mini-profile-info {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .mini-profile-name {
      font-weight: bold;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
    }

    .mini-profile-rank {
      font-size: 0.8rem;
      color: #aaa;
    }

    .member {
      padding: 0.8rem;
      border-bottom: 1px dashed #444;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
    }

    .member:hover {
      background: rgba(255,255,255,0.05);
    }

    .member-actions {
      margin-right: auto;
      display: flex;
      gap: 5px;
    }

    .member-action-btn {
      background: rgba(255,255,255,0.1);
      border: none;
      color: #ccc;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .member-action-btn:hover {
      background: rgba(255,255,255,0.2);
      color: white;
    }

    .captain-badge {
      background: #FFD700;
      color: #000;
      padding: 0.2rem 0.5rem;
      border-radius: 4px;
      font-size: 0.7rem;
      font-weight: bold;
      margin-right: 5px;
    }

    .team-actions {
      margin-top: 1.5rem;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .team-actions button {
      flex: 1;
      min-width: 120px;
    }
  </style>
</head>
<body>

<header class="main-header">
  <div class="header-overlay">
    <h1>مدیریت تیم‌های من</h1>
    <p>اینجا می‌تونی تیم خودتو بسازی، اعضا اضافه کنی و برای تورنمنت ثبت‌نام کنی.</p>
    <div class="header-buttons">
      <a href="index.php" class="nav-btn"><i class="fas fa-home"></i> صفحه اصلی</a>
      <a href="tournoment.php" class="nav-btn"><i class="fas fa-trophy"></i> تورنومنت‌ها</a>
    </div>
  </div>
</header>

<div class="container">

  <!-- انتخاب تیم -->
  <div class="team-switcher">
    <select id="team-selector">
      <option value="team1">Radiant Kings</option>
      <option value="team2">DarkSide Hunters</option>
      <option value="new">+ تیم جدید</option>
    </select>
  </div>

  <!-- ساخت تیم -->
  <div class="card" id="new-team-form">
    <h2><i class="fas fa-users-cog"></i> ساخت تیم جدید</h2>
    <form id="create-team-form">
      <div class="form-group">
        <label>نام تیم:</label>
        <input type="text" placeholder="مثل: Radiant Kings" required />
      </div>
      <div class="form-group">
        <label>لوگوی تیم (لینک عکس):</label>
        <input type="text" placeholder="https://..." />
      </div>
      <div class="form-group">
        <label>توضیح کوتاه:</label>
        <textarea rows="3" placeholder="چند خط در مورد تیمت بنویس..."></textarea>
      </div>
      <button type="submit"><i class="fas fa-plus-circle"></i> ایجاد تیم</button>
    </form>
  </div>

  <!-- نمایش تیم‌های من -->
  <div class="card">
    <h2><i class="fas fa-shield-alt"></i> تیم‌های من</h2>
    
    <div class="team-tabs">
      <button class="tab-btn active" data-tab="info">اطلاعات تیم</button>
      <button class="tab-btn" data-tab="members">اعضا</button>
      <button class="tab-btn" data-tab="history">تاریخچه</button>
    </div>
    
    <div class="tab-content active" id="info">
      <div class="team-list">
        <div class="team-card">
          <h3><i class="fas fa-crown"></i> Radiant Kings</h3>
          <p>توضیح: تیم خفن ما برای تورنمنت‌های حرفه‌ای. ما بهترین بازیکنان منطقه را گرد هم آورده‌ایم و آماده هر چالشی هستیم!</p>
          <div class="member-list">
            <strong>اعضا:</strong>
            <div class="member">
              <div class="profile-avatar">
                <img src="images/photo19808109596_2_11zon.webp" alt="Amirhossein">
              </div>
              <div class="mini-profile-info">
                <span class="mini-profile-name"><span class="captain-badge">کاپیتان</span> Amirhossein</span>
                <span class="mini-profile-rank">Divine | پوزیشن 1 (Carry)</span>
              </div>
              <div class="member-actions">
                <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              </div>
            </div>
            <div class="member">
              <div class="profile-avatar">A</div>
              <div class="mini-profile-info">
                <span class="mini-profile-name">AliTheMage</span>
                <span class="mini-profile-rank">Ancient | پوزیشن 2 (Mid)</span>
              </div>
              <div class="member-actions">
                <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              </div>
            </div>
            <div class="member">
              <div class="profile-avatar">F</div>
              <div class="mini-profile-info">
                <span class="mini-profile-name">FarhadSniper</span>
                <span class="mini-profile-rank">Legend | پوزیشن 3 (Offlane)</span>
              </div>
              <div class="member-actions">
                <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              </div>
            </div>
          </div>
          <div class="team-actions">
            <button><i class="fas fa-user-plus"></i> دعوت عضو جدید</button>
            <button><i class="fas fa-cogs"></i> تنظیمات تیم</button>
            <button><i class="fas fa-trophy"></i> شرکت در تورنمنت</button>
          </div>
        </div>

        <div class="team-card">
          <h3><i class="fas fa-skull"></i> DarkSide Hunters</h3>
          <p>توضیح: تیمی برای کابوس شب‌ها! ما با استراتژی‌های غیرقابل پیش‌بینی حریفان را شگفت‌زده می‌کنیم.</p>
          <div class="member-list">
            <strong>اعضا:</strong>
            <div class="member">
              <div class="profile-avatar">
                <img src="images/photo19808202305_5_11zon.webp" alt="Parsa">
              </div>
              <div class="mini-profile-info">
                <span class="mini-profile-name"><span class="captain-badge">کاپیتان</span> ParsaSmoker</span>
                <span class="mini-profile-rank">Immortal | پوزیشن 2 (Mid)</span>
              </div>
              <div class="member-actions">
                <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              </div>
            </div>
            <div class="member">
              <div class="profile-avatar">R</div>
              <div class="mini-profile-info">
                <span class="mini-profile-name">RezaDark</span>
                <span class="mini-profile-rank">Divine | پوزیشن 4 (Support)</span>
              </div>
              <div class="member-actions">
                <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              </div>
            </div>
          </div>
          <div class="team-actions">
            <button><i class="fas fa-user-plus"></i> دعوت عضو جدید</button>
            <button><i class="fas fa-cogs"></i> تنظیمات تیم</button>
            <button><i class="fas fa-trophy"></i> شرکت در تورنمنت</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-content" id="members">
      <div class="team-card">
        <h3><i class="fas fa-users"></i> مدیریت اعضا</h3>
        <div class="form-group">
          <label>نام کاربری بازیکن:</label>
          <input type="text" placeholder="نام کاربری بازیکن را وارد کنید" />
        </div>
        <button><i class="fas fa-plus"></i> افزودن عضو</button>
        
        <div class="member-list" style="margin-top: 2rem;">
          <h4>اعضای فعلی تیم</h4>
          <div class="member">
            <div class="profile-avatar">
              <img src="images/photo19808109596_2_11zon.webp" alt="Amirhossein">
            </div>
            <div class="mini-profile-info">
              <span class="mini-profile-name"><span class="captain-badge">کاپیتان</span> Amirhossein</span>
              <span class="mini-profile-rank">Divine | پوزیشن 1 (Carry)</span>
            </div>
            <div class="member-actions">
              <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              <button class="member-action-btn" title="حذف از تیم"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="member">
            <div class="profile-avatar">A</div>
            <div class="mini-profile-info">
              <span class="mini-profile-name">AliTheMage</span>
              <span class="mini-profile-rank">Ancient | پوزیشن 2 (Mid)</span>
            </div>
            <div class="member-actions">
              <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
              <button class="member-action-btn" title="حذف از تیم"><i class="fas fa-times"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-content" id="history">
      <div class="team-card">
        <h3><i class="fas fa-history"></i> تاریخچه تورنمنت‌ها</h3>
        <p>در حال حاضر هیچ تاریخچه‌ای ثبت نشده است.</p>
        <div style="margin-top: 1rem; padding: 1rem; background: rgba(0,0,0,0.2); border-radius: 8px;">
          <i class="fas fa-info-circle"></i> پس از شرکت در تورنمنت‌ها، نتایج و تاریخچه اینجا نمایش داده می‌شود.
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fog-layer"></div>

<script>
  // مدیریت تب‌ها
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const tabId = btn.getAttribute('data-tab');
      
      // حذف کلاس active از همه تب‌ها و محتواها
      document.querySelectorAll('.tab-btn').forEach(tb => tb.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
      
      // اضافه کردن کلاس active به تب و محتوای انتخاب شده
      btn.classList.add('active');
      document.getElementById(tabId).classList.add('active');
    });
  });
  
  // مدیریت فرم ساخت تیم
  document.getElementById('create-team-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const teamName = this.querySelector('input[type="text"]').value;
    if (!teamName) {
      alert('لطفا نام تیم را وارد کنید');
      return;
    }
    alert(`تیم "${teamName}" با موفقیت ایجاد شد!`);
    this.reset();
  });
  
  // مدیریت انتخاب تیم
  document.getElementById('team-selector').addEventListener('change', function() {
    if (this.value === 'new') {
      document.getElementById('new-team-form').scrollIntoView({ behavior: 'smooth' });
    }
  });

  // مشاهده پروفایل اعضا
  document.querySelectorAll('.member-action-btn .fa-user').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const memberName = this.closest('.member').querySelector('.mini-profile-name').textContent;
      alert(`پروفایل ${memberName} نمایش داده خواهد شد (این بخش در نسخه نهایی پیاده‌سازی می‌شود)`);
    });
  });

  // دعوت عضو جدید
  document.querySelectorAll('.team-actions button:nth-child(1)').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelectorAll('.tab-btn').forEach(tb => tb.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
      document.querySelector('.tab-btn[data-tab="members"]').classList.add('active');
      document.getElementById('members').classList.add('active');
      document.getElementById('members').scrollIntoView({ behavior: 'smooth' });
    });
  });

  // تنظیمات تیم
  document.querySelectorAll('.team-actions button:nth-child(2)').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      alert('بخش تنظیمات تیم در حال توسعه است!');
    });
  });

  // شرکت در تورنمنت
  document.querySelectorAll('.team-actions button:nth-child(3)').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      window.location.href = 'tournoment.php';
    });
  });

  // افزودن عضو جدید
  document.querySelector('#members button').addEventListener('click', function(e) {
    e.preventDefault();
    const usernameInput = document.querySelector('#members input[type="text"]');
    const username = usernameInput.value.trim();
    if (!username) {
      alert('لطفا نام کاربری بازیکن را وارد کنید');
      return;
    }
    const memberList = document.querySelector('#members .member-list');
    const newMember = document.createElement('div');
    newMember.className = 'member';
    newMember.innerHTML = `
      <div class="profile-avatar">${username.charAt(0).toUpperCase()}</div>
      <div class="mini-profile-info">
        <span class="mini-profile-name">${username}</span>
        <span class="mini-profile-rank">رنک نامشخص</span>
      </div>
      <div class="member-actions">
        <button class="member-action-btn" title="مشاهده پروفایل"><i class="fas fa-user"></i></button>
        <button class="member-action-btn" title="حذف از تیم"><i class="fas fa-times"></i></button>
      </div>
    `;
    memberList.appendChild(newMember);
    usernameInput.value = '';
    
    // اضافه کردن event listener برای دکمه‌های جدید
    newMember.querySelector('.member-action-btn .fa-user').addEventListener('click', function() {
      alert(`پروفایل ${username} نمایش داده خواهد شد`);
    });
    
    newMember.querySelector('.member-action-btn .fa-times').addEventListener('click', function() {
      if(confirm(`آیا مطمئن هستید که می‌خواهید ${username} را از تیم حذف کنید؟`)) {
        newMember.remove();
      }
    });
  });

  // حذف اعضای قبلی
  document.querySelectorAll('#members .member-action-btn .fa-times').forEach(btn => {
    btn.addEventListener('click', function() {
      const member = this.closest('.member');
      const memberName = member.querySelector('.mini-profile-name').textContent;
      if(confirm(`آیا مطمئن هستید که می‌خواهید ${memberName} را از تیم حذف کنید؟`)) {
        member.remove();
      }
    });
  });
</script>

  <script src="js/team_dynamic.js"></script>
</body>
</html>