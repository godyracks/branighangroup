document.addEventListener("DOMContentLoaded", () => {
    const e = document.querySelector("#desktop-theme-switch"),
        t = document.querySelector("#desktop-theme-icon"),
        n = document.querySelector("#mobile-theme-switch"),
        o = document.querySelector("#mobile-theme-icon"),
        l = document.getElementById("desktop-logo-light"),
        c = document.getElementById("desktop-logo-dark"),
        d = document.getElementById("mobile-logo-light"),
        s = document.getElementById("mobile-logo-dark"),
        i = document.getElementById("footer-logo-light"),
        a = document.getElementById("footer-logo-dark");

    function r(e, t, n) {
        "dark" === e ? (t.style.display = "none", n.style.display = "block") : (t.style.display = "block", n.style.display = "none")
    }

    function m(e) {
        window.matchMedia("(max-width: 767px)").matches ? r(e, d, s) : r(e, l, c), r(e, i, a)
    }
    const u = localStorage.getItem("theme") || "light";
    document.documentElement.setAttribute("data-theme", u), e.checked = "dark" === u, t.textContent = "dark" === u ? "light_mode" : "dark_mode", n.checked = "dark" === u, o.textContent = "dark" === u ? "light_mode" : "dark_mode", m(u), e.addEventListener("change", () => {
        const n = e.checked ? "dark" : "light";
        document.documentElement.setAttribute("data-theme", n), localStorage.setItem("theme", n), t.textContent = "dark" === n ? "light_mode" : "dark_mode", m(n)
    }), n.addEventListener("change", () => {
        const e = n.checked ? "dark" : "light";
        document.documentElement.setAttribute("data-theme", e), localStorage.setItem("theme", e), o.textContent = "dark" === e ? "light_mode" : "dark_mode", m(e)
    }), window.addEventListener("resize", () => {
        m(document.documentElement.getAttribute("data-theme"))
    })
});
const menuCheckbox = document.getElementById("menu-checkbox"),
    menuIcon = document.querySelector(".menu-icon"),
    sideNavMenu = document.getElementById("side-nav-menu");

function togglePasswordVisibility(e, t) {
    const n = document.getElementById(e),
        o = document.getElementById(t);
    "password" === n.type ? (n.type = "text", o.textContent = "visibility_off") : (n.type = "password", o.textContent = "visibility")
}
menuCheckbox.addEventListener("change", () => {
    menuCheckbox.checked ? (sideNavMenu.classList.remove("close"), sideNavMenu.classList.add("open"), menuIcon.textContent = "close") : (sideNavMenu.classList.remove("open"), sideNavMenu.classList.add("close"), menuIcon.textContent = "menu")
}), document.addEventListener("DOMContentLoaded", function() {
    const e = document.querySelector(".carousel-container"),
        t = document.querySelectorAll(".carousel-item"),
        n = document.querySelector(".prev-btn"),
        o = document.querySelector(".next-btn"),
        l = document.querySelector(".carousel-dots");
    let c = 0;
    t.forEach((e, t) => {
        const n = document.createElement("span");
        n.classList.add("dot"), 0 === t && n.classList.add("active"), n.addEventListener("click", () => {
            c = t, s()
        }), l.appendChild(n)
    });
    const d = document.querySelectorAll(".dot");

    function s() {
        e.style.transform = `translateX(-${100*c}%)`, d.forEach(e => e.classList.remove("active")), d[c].classList.add("active")
    }
    n.addEventListener("click", () => {
        c = c > 0 ? c - 1 : t.length - 1, s()
    }), o.addEventListener("click", () => {
        c = (c + 1) % t.length, s()
    }), setInterval(() => {
        c = (c + 1) % t.length, s()
    }, 3e3)
}), document.addEventListener("DOMContentLoaded", () => {
    const e = document.querySelector(".chevron-down"),
        t = document.getElementById("find-home");
    e.addEventListener("click", () => {
        t.scrollIntoView({
            behavior: "smooth"
        })
    })
}),window.addEventListener("scroll", function() {
    var e = document.getElementById("navbar");
    if (window.scrollY > e.offsetTop) {
        e.classList.add("translucent");
    } else {
        e.classList.remove("translucent");
    }
}), document.addEventListener("DOMContentLoaded", function() {
    const e = document.querySelector(".scroll-left"),
        t = document.querySelector(".scroll-right"),
        n = (document.querySelector(".small-images"), document.querySelector(".big-image")),
        o = document.querySelectorAll(".small-images img");
    let l = 0;

    function c() {
        n.src = o[l].src
    }

    function d() {
        e.style.visibility = 0 === l ? "hidden" : "visible", t.style.visibility = l === o.length - 1 ? "hidden" : "visible"
    }
    o.forEach((e, t) => {
        e.addEventListener("click", function() {
            l = t, c(), d()
        })
    }), e.addEventListener("click", function() {
        l > 0 && (l--, c(), d())
    }), t.addEventListener("click", function() {
        l < o.length - 1 && (l++, c(), d())
    })
}), document.addEventListener("DOMContentLoaded", function() {
    const e = document.querySelector(".big-image"),
        t = document.createElement("i"),
        n = document.createElement("i"),
        o = document.createElement("i"),
        l = document.querySelectorAll(".small-images img"),
        c = document.querySelector(".small-images");
    let d;
    t.classList.add("material-icons", "play-button"), t.textContent = "play_circle_outline", t.style.position = "absolute", t.style.bottom = "130px", t.style.left = "10px", t.style.color = "#fff", t.style.cursor = "pointer", t.style.fontSize = "36px", t.style.zIndex = "1", n.classList.add("material-icons", "expand-button"), n.textContent = "fullscreen", n.style.position = "absolute", n.style.bottom = "130px", n.style.right = "10px", n.style.color = "#fff", n.style.cursor = "pointer", n.style.fontSize = "36px", n.style.zIndex = "999", o.classList.add("material-icons", "normal-screen-button"), o.textContent = "fullscreen_exit", o.style.position = "absolute", o.style.bottom = "130px", o.style.right = "10px", o.style.color = "#fff", o.style.cursor = "pointer", o.style.fontSize = "36px", o.style.zIndex = "999", o.style.display = "none", e.parentElement.appendChild(t), e.parentElement.appendChild(n), e.parentElement.appendChild(o);
    let s = 0;

    function i() {
        a(s = (s + 1) % l.length)
    }

    function a(t) {
        e.classList.add("fade-out"), setTimeout(() => {
            e.src = l[t].src, e.classList.remove("fade-out"), l.forEach(e => e.classList.remove("active")), l[t].classList.add("active");
            const n = l[t],
                o = c.offsetWidth,
                d = n.offsetLeft,
                i = n.offsetWidth;
            c.scrollTo({
                left: d - o / 2 + i / 2,
                behavior: "smooth"
            }), s = t
        }, 500)
    }
    t.addEventListener("click", function() {
        d ? (clearInterval(d), d = null, t.textContent = "play_circle_outline") : (d = setInterval(i, 2e3), t.textContent = "pause_circle_outline")
    }), n.addEventListener("click", function() {
        document.fullscreenEnabled && (document.fullscreenElement || (e.requestFullscreen(), e.classList.add("fullscreen"), n.style.display = "none", o.style.display = "block"))
    }), o.addEventListener("click", function() {
        document.fullscreenElement && (document.exitFullscreen(), e.classList.remove("fullscreen"), o.style.display = "none", n.style.display = "block")
    }), l.forEach((e, t) => {
        e.addEventListener("click", () => {
            a(t)
        })
    }), document.addEventListener("fullscreenchange", () => {
        document.fullscreenElement || (e.classList.remove("fullscreen"), o.style.display = "none", n.style.display = "block")
    }), l[0].classList.add("active")
}), document.addEventListener("DOMContentLoaded", () => {
    const e = document.getElementById("login-modal"),
        t = document.getElementById("register-modal"),
        n = document.getElementById("forgot-password-modal"),
        o = document.querySelectorAll("#login-link, #side-login-link"),
        l = document.querySelectorAll("#register-link, #side-register-link"),
        c = document.getElementById("forgot-password-link"),
        d = document.querySelectorAll(".close-button"),
        s = document.getElementById("login-link-modal"),
        i = document.getElementById("register-link-modal"),
        a = document.getElementById("menu-checkbox"),
        r = document.querySelector(".menu-icon"),
        m = document.getElementById("side-nav-menu");

    function u() {
        a.checked = !1, m.style.left = "-150%", r.textContent = "menu"
    }
    o.forEach(t => {
        t.addEventListener("click", t => {
            t.preventDefault(), e.style.display = "block", u()
        })
    }), l.forEach(e => {
        e.addEventListener("click", e => {
            e.preventDefault(), t.style.display = "block", u()
        })
    }), c && c.addEventListener("click", t => {
        t.preventDefault(), e.style.display = "none", n.style.display = "block", u()
    }), d.forEach(o => {
        o.addEventListener("click", () => {
            e.style.display = "none", t.style.display = "none", n.style.display = "none"
        })
    }), window.addEventListener("click", o => {
        o.target == e ? e.style.display = "none" : o.target == t ? t.style.display = "none" : o.target == n && (n.style.display = "none")
    }), i.addEventListener("click", n => {
        n.preventDefault(), e.style.display = "none", t.style.display = "block"
    }), s.addEventListener("click", n => {
        n.preventDefault(), t.style.display = "none", e.style.display = "block"
    }), a.addEventListener("change", () => {
        a.checked ? (m.style.left = "0", r.textContent = "close") : (m.style.left = "-150%", r.textContent = "menu")
    })
}), document.getElementById("instagram").addEventListener("click", function() {
    const currentUrl = encodeURIComponent(window.location.href);
    const instagramShareUrl = `https://www.instagram.com/u=${currentUrl}`;
    window.open(instagramShareUrl, "_blank");
}), document.getElementById("facebook").addEventListener("click", function() {
    window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href), "_blank")
}), document.getElementById("other").addEventListener("click", function() {
    var e = "https://twitter.com/intent/tweet?text=" + encodeURIComponent("Check out this awesome latest house listing:") + "&url=" + encodeURIComponent(window.location.href);
    window.open(e, "_blank")
});