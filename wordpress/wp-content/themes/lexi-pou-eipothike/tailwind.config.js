module.exports = {
  content: require("fast-glob").sync(["./**/*.php", "*.php"]),
  safelist: [
    {
      pattern: /text-(lg|sm|xs|[1-9]xl)/,
    },
    {
      pattern: /(.*)primary(.*)/,
    },
    {
      pattern: /(.*)secondary(.*)/,
    }
  ],
  theme: {
    extend: {
      colors: {
        primary: "#FFE700",
        secondary: "#B5003A"
      },
    },
  },
  plugins: [],
};
