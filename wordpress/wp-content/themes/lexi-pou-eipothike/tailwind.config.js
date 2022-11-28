module.exports = {
  content: require("fast-glob").sync(["./**/*.php", "*.php"]),
  safelist: [
    {
      pattern: /text-(lg|sm|xs|[1-9]xl)/,
    },
    {
      pattern: /(.*)apple(.*)/,
    },
    {
      pattern: /(.*)ocean(.*)/,
    },
    {
      pattern: /(.*)sky(.*)/,
    },
    {
      pattern: /(.*)grape(.*)/,
    }
  ],
  theme: {
    extend: {
      colors: {
        ocean: {
          160: "#114A5C",
          140: "#1A6F8B",
          120: "#2294B9",
          110: "#27A7D0",
          DEFAULT: "#2BB9E7",
          90: "#41C0EA",
          80: "#55C7EC",
          70: "#6BCEEF",
          60: "#80D5F1",
          50: "#95DCF3",
          40: "#AAE3F5",
          30: "#C0EAF8",
          20: "#D5F1FA",
          10: "#EAF8FD",
          0: "#F4FBFE"
        },
        apple: {
          160: "#62201B",
          140: "#933029",
          120: "#C44036",
          110: "#DD483D",
          DEFAULT: "#F55044",
          90: "#F66257",
          80: "#F77369",
          70: "#F8857D",
          60: "#F9968F",
          50: "#FAA8A2",
          40: "#FBB9B4",
          30: "#FCCBC7",
          20: "#FDDCDA",
          10: "#FEEEED",
          0: "#FEF6F5"
        },
        sky: {
          120: "#1C849A",
          110: "#2095AE",
          DEFAULT: "#23A5C1",
          90: "#39AEC8",
          80: "#4FB7CD",
          70: "#65C0D4",
          60: "#7BC9DA",
          50: "#91D2E0",
          40: "#A7DBE6",
          30: "#BDE4ED",
          20: "#D3EDF3",
          10: "#E9F6F9",
          0: "#F4FAFC"
        },
        grape: {
          120: "#520A75",
          110: "#5D0C84",
          DEFAULT: "#670D92",
          90: "#77269D",
          80: "#853DA8",
          70: "#9556B3",
          60: "#A46EBE",
          50: "#B386C9",
          40: "#C29ED3",
          30: "#D2B7DF",
          20: "#E1CFE9",
          10: "#F0E7F5",
          0: "#F7F3F9"
        }
      },
    },
  },
  plugins: [],
};
