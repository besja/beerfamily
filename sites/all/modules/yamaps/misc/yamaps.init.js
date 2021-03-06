/**
 * @file
 * Initialize object extended to jQuery for global operations.
 */

(function($) {
  Drupal.behaviors.yamapsInit = {
    attach: function (context, settings) {
      ymaps.ready(function() {
        $.extend({
          yaMaps: {
            // Maps on page.
            maps: {},
            // Map tools.
            _mapTools: [],
            // Layouts.
            _layouts: {},
            addMapTools: function(button) {
              this._mapTools.push(button);
            },
            getMapTools: function(Map) {
              var tools = [];
              for (var i in this._mapTools) {
                if (typeof this._mapTools[i] == 'function') {
                  tools.push(this._mapTools[i](Map));
                }
                else {
                  tools.push(this._mapTools[i]);
                }
              }
              return tools;
            },
            addLayout: function(name, layout) {
              this._layouts[name] = layout;
            },
            initLayouts: function() {
              for (var name in this._layouts) {
                ymaps.layout.storage.add(name, this._layouts[name]);
              }
            }
          }
        });

        $.yaMaps.BaseYamapsObject = {
          // Edit mode for line and polygon.
          startEditing: function(active) {
            this.element.editor.startEditing();
            if (active) {
              this.element.editor.state.set('drawing', true);
            }
            this.element.editor.events.add('statechange', function(e) {
              if (this.element.editor.state.get('editing') && !this.element.editor.state.get('drawing')) {
                this.openBalloon();
              }
            }, this);
          },
          // Set line and polygon colors.
          setColor: function(strokeColor, fillColor) {
            this.element.options.set('strokeColor', $.yaMaps.colors[strokeColor]);
            if (typeof fillColor != 'undefined') {
              this.element.options.set('fillColor', $.yaMaps.colors[fillColor]);
            }
          },
          // Set balloon content.
          setContent: function(balloonContent) {
            this.element.properties.set('balloonContent', balloonContent);
          },
          // Set opacity.
          setOpacity: function(opacity) {
            this.element.options.set('opacity', opacity);
          },
          // Set line width.
          setWidth: function(width) {
            this.element.options.set('strokeWidth', width);
          },
          // Open balloon.
          openBalloon: function() {
            this.element.balloon.open();
          },
          // Close balloon.
          closeBalloon: function() {
            this.element.balloon.close();
          },
          // Remove line or polygon.
          remove: function() {
            this.getParent().remove(this);
            this.exportParent();
          },
          // Set parent object.
          setParent: function(Parent) {
            this.parent = Parent;
          },
          // Get parent.
          getParent: function() {
            return this.parent;
          },
          // Export line or polygon.
          export: function() {
            var coords = this.element.geometry.getCoordinates();
            if (typeof coords[0] != 'object' || coords.length < 1) {
              return;
            }
            else {
              if (typeof coords[0][0] == 'object') {
                if (coords[0].length < 3) {
                  return;
                }
              }
              else if (coords.length < 2) {
                return;
              }
            }
            var props = this.element.properties.getAll();
            var data = {
              coords: coords,
              params: {
                strokeWidth: props.strokeWidth,
                strokeColor: props.strokeColor,
                balloonContent: props.balloonContent,
                opacity: props.opacity
              }
            };
            if (typeof props.fillColor != 'undefined') {
              data.params.fillColor = props.fillColor;
            }
            return data;
          },
          // Export all lines or polygons on this map to html container.
          exportParent: function() {
            var collection = this.getParent();
            if (collection) {
              collection.exportToHTML();
            }
          },
          // Init object.
          _init: function(element) {
            this.element = element;
            this.parent = null;

            // Actions for export lines or polygons.
            this.element.events.add(['geometrychange', 'propertieschange'], this.exportParent, this);

            // Line or polygon initialization parameters.
            this.element.properties.set('element', this);
            var properties = this.element.properties.getAll();
            this.setColor(properties.strokeColor, properties.fillColor);
            this.setOpacity(properties.opacity);
            this.setWidth(properties.strokeWidth);
          }
        };

        $.yaMaps.BaseYamapsObjectCollection = {
          // Export collection.
          export: function() {
            var data = [];
            this.elements.each(function(element) {
              var content = element.properties.get('element').export();
              if (content) {
                data.push(content);
              }
            });
            return data;
          },
          // Export collection to HTML element.
          exportToHTML: function() {
            var elements = this.export();
            var mapId = this.elements.getMap().container.getElement().parentElement.id;
            var $storage = $(this.storagePrefix + mapId);
            $storage.val(JSON.stringify(elements));
          },
          // Add new line or polygon to collection.
          add: function(Element) {
            Element.setParent(this);
            this.elements.add(Element.element);
            return Element;
          },
          // Remove polygon or line from map.
          remove: function(Element) {
            this.elements.remove(Element.element);
          },
          // Init object.
          _init: function(options) {
            this.elements = new ymaps.GeoObjectCollection();
            this.elements.options.set(options);
          }
        };
      });
    }
  }
})(jQuery);
