<template>
    <default-field :field="field" :errors="errors" :fullWidthContent="true">
        <template slot="field">
            <div :id="field.name" class="form-text form-input form-input-bordered w-850"></div>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    const EditorJS = require('@editorjs/editorjs');
    const Paragraph = require('@editorjs/paragraph');
    const ImageTool = require('@editorjs/image');
    const CodeTool = require('@editorjs/code');
    const Header = require('@editorjs/header');
    const List = require('@editorjs/list');
    const LinkTool = require('@editorjs/link');
    const InlineCode = require('@editorjs/inline-code');
    const Table = require('@editorjs/table');
    const Embed = require('@editorjs/embed');

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {

                let self = this;
                let currentContent = JSON.parse(self.field.value);

                var editor = new EditorJS({
                    /**
                     * Wrapper of Editor
                     */
                    holderId: this.field.name,
                    /**
                     * autofocus
                     **/
                     autofocus: true,
                    /**
                     * Tools list
                     */
                    tools: {
                        header: {
                            class: Header,
                            inlineToolbar: ['link'],
                            config: {
                                placeholder: 'Header'
                            },
                            toolbox: {
                                title: 'Заголовок'
                            },
                            shortcut: 'CMD+SHIFT+H'
                        },
                        list: {
                            class: List,
                            inlineToolbar: true,
                            shortcut: 'CMD+SHIFT+L',
                            toolbox: {
                                title: 'Список'
                            },
                        },
                        code: {
                            class: CodeTool,
                            shortcut: 'CMD+SHIFT+C',
                            toolbox: {
                                title: 'Код'
                            },
                        },
                        linkTool: {
                            class: LinkTool,
                            config: {
                                endpoint: self.field.fetchUrlEndpoint,
                            },
                            toolbox: {
                                title: 'Виджет ссылки'
                            },
                        },
                        embed: {
                            class: Embed,
                            inlineToolbar: true
                        },
                        linkTool: LinkTool,
                        image: {
                            class: ImageTool,
                            toolbox: {
                                title: 'Изображение'
                            },
                            config: {
                                endpoints: {
                                    byFile: self.field.uploadImageByFileEndpoint,
                                    byUrl: self.field.uploadImageByUrlEndpoint,
                                },
                                additionalRequestHeaders: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            }
                        },
                        table: {
                            class: Table,
                            inlineToolbar: true,
                            config: {
                                rows: 2,
                                cols: 2,
                            },
                            toolbox: {
                                title: 'Таблица'
                            },
                        },
                        embed: {
                            class: Embed,
                            config: {
                                services: {
                                    youtube: true,
                                }
                            },
                            toolbox: {
                                title: 'Youtube'
                            },
                        },
                        inlineCode: {
                            class: InlineCode,
                            shortcut: 'CMD+SHIFT+M',
                        },
                    },
                    /**
                     * This Tool will be used as default
                     */
                    initialBlock: 'paragraph',

                    /**
                     * Initial Editor data
                     */
                    data: currentContent,
                    onReady: function () {

                    },
                    onChange: function () {
                        editor.save().then((savedData) => {
                            self.handleChange(savedData)
                        });
                    }
                });
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = JSON.stringify(value)
            },
        },
    }
</script>
