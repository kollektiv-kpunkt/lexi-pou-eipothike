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
        primary: "#9EFF00",
        secondary: "#3B009C"
      },
    },
  },
  plugins: [],
};
