(() => {
"use strict";
var e,
t = {
250: () => {
const e = window.wp.blocks,
t = window.React,
o = (window.wp.i18n, window.wp.blockEditor),
n = JSON.parse('{"u2":"create-block/promotional-component"}');
(0, e.registerBlockType)(n.u2, {
attributes: {
image: { type: "string", default: "https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1" },
title: { type: "string", default: "" },
text: { type: "string", default: "" },
buttonText: { type: "string", default: "" },
buttonUrl: { type: "string", default: "" },
showButton: { type: "boolean", default: !0 },
reversed: { type: "boolean", default: !1 },
},
edit: function (e) {
const { attributes: n, setAttributes: a } = e,
{ image: l, title: r, text: c, buttonText: i, buttonUrl: m, showButton: p, reversed: s } = n;
return (0, t.createElement)(
"div",
{ className: "wp-block", ...(0, o.useBlockProps)() },
(0, t.createElement)(
"div",
{ className: "promotional-component" },
(0, t.createElement)(
"div",
{ className: "promotional-component__container " + (s ? "reversed" : "") },
(0, t.createElement)(
"div",
{ className: "promotional-component__image" },
(0, t.createElement)(
"div",
{ className: "promotional-component__upload-buttons" },
(0, t.createElement)(o.MediaUpload, {
onSelect: (e) => {
a({ image: e.url });
},
allowedTypes: ["image"],
value: l,
render: ({ open: e }) => (0, t.createElement)("div", { onClick: e, className: "promotional-component__upload-button" }, "Upload image"),
}),
(0, t.createElement)(
"div",
{
onClick: () => {
const e = prompt("Enter the button link", m);
a({ buttonUrl: e });
},
className: "promotional-component__upload-button",
},
"Add button link"
),
(0, t.createElement)(
"div",
{ className: "promotional-component__upload-button" },
"Show button?",
(0, t.createElement)("input", { type: "checkbox", checked: p, onChange: () => a({ showButton: !p }) })
),
(0, t.createElement)(
"div",
{ className: "promotional-component__upload-button" },
"Reversed?",
(0, t.createElement)("input", { type: "checkbox", checked: s, onChange: () => a({ reversed: !s }) })
)
),
(0, t.createElement)("img", { src: l, alt: "Promotional" })
),
(0, t.createElement)(
"div",
{ className: "promotional-component__content" },
(0, t.createElement)("input", { type: "text", className: "promotional-component__title-input", value: r, placeholder: "Title here", onChange: (e) => a({ title: e.target.value }) }),
(0, t.createElement)("textarea", { type: "text", onChange: (e) => a({ text: e.target.value }), className: "promotional-component__text-textarea", placeholder: "Description here" }, c),
p &&
(0, t.createElement)(
"div",
{ className: "promotional-component__button" },
(0, t.createElement)("input", { type: "text", className: "promotional-component__button-input", value: i, placeholder: "Button text here", onChange: (e) => a({ buttonText: e.target.value }) })
)
)
)
)
);
},
save: function (e) {
const { attributes: n } = e,
{ image: a, title: l, text: r, buttonText: c, buttonUrl: i, showButton: m, reversed: p } = n;
return (0, t.createElement)(
"div",
{ ...o.useBlockProps.save(), className: "promotional-component" },
(0, t.createElement)(
"div",
{ className: "promotional-component__container " + (p ? "reversed" : "") },
(0, t.createElement)("div", { className: "promotional-component__image" }, (0, t.createElement)("img", { src: a, alt: "Promotional" })),
(0, t.createElement)(
"div",
{ className: "promotional-component__content" },
(0, t.createElement)("h2", { className: "promotional-component__title" }, l),
(0, t.createElement)("div", { className: "promotional-component__text" }, r),
m && (0, t.createElement)("a", { href: i, className: "promotional-component__button" }, c)
)
)
);
},
});
},
},
o = {};
function n(e) {
var a = o[e];
if (void 0 !== a) return a.exports;
var l = (o[e] = { exports: {} });
return t[e](l, l.exports, n), l.exports;
}
(n.m = t),
(e = []),
(n.O = (t, o, a, l) => {
if (!o) {
var r = 1 / 0;
for (p = 0; p < e.length; p++) {
for (var [o, a, l] = e[p], c = !0, i = 0; i < o.length; i++) (!1 & l || r >= l) && Object.keys(n.O).every((e) => n.O[e](o[i])) ? o.splice(i--, 1) : ((c = !1), l < r && (r = l));
if (c) {
e.splice(p--, 1);
var m = a();
void 0 !== m && (t = m);
}
}
return t;
}
l = l || 0;
for (var p = e.length; p > 0 && e[p - 1][2] > l; p--) e[p] = e[p - 1];
e[p] = [o, a, l];
}),
(n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
(() => {
var e = { 826: 0, 431: 0 };
n.O.j = (t) => 0 === e[t];
var t = (t, o) => {
var a,
l,
[r, c, i] = o,
m = 0;
if (r.some((t) => 0 !== e[t])) {
for (a in c) n.o(c, a) && (n.m[a] = c[a]);
if (i) var p = i(n);
}
for (t && t(o); m < r.length; m++) (l = r[m]), n.o(e, l) && e[l] && e[l][0](), (e[l] = 0);
return n.O(p);
},
o = (globalThis.webpackChunkpromotional_component = globalThis.webpackChunkpromotional_component || []);
o.forEach(t.bind(null, 0)), (o.push = t.bind(null, o.push.bind(o)));
})();
var a = n.O(void 0, [431], () => n(250));
a = n.O(a);
})();
