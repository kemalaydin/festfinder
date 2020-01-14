module.exports = {
  theme: {
      gradients: theme => ({
          // Array definition (defaults to linear gradients).
          'topaz':      ['30deg', theme('colors.orange.500'), theme('colors.pink.400')],
          'topaz-dark': ['30deg', theme('colors.orange.700'), theme('colors.pink.600')],
          'emerald':    ['to right', theme('colors.green.400'), theme('colors.teal.500')],
          'fireopal':   ['to right', '#40E0D0', '#FF8C00', '#FF0080'],
          'relay':      ['to top left', '#3A1C71', '#D76D77', '#FFAF7B'],

          // Object definition.
          'mono-circle': {
              type: 'radial',
              colors: ['circle', '#CCC', '#000']
          },
      }),
    extend: {
        colors: {
            'primary': '#e1234f',
            'primary-100': '#FFE4E4',
            'primary-200': '#f9d2db',
            'primary-300': '#f3a5b7',
            'primary-400': '#ed7893',
            'primary-500': '#e74b70',
            'primary-600': '#b4183d',
            'primary-700': '#700f26',
            'primary-800': '#430917',
            'secondary' : '#574142',
            'secondary-100' : '#ECD1D2',
            'secondary-200' : '#C5AAAB',
            'secondary-300' : '#9E8586',
            'secondary-400' : '#7A6263',
        }
    }
  },

    variants: {
        gradients: ['responsive', 'hover'],
    },
    plugins: [
        require('tailwindcss-plugins/gradients'),
    ],

}
